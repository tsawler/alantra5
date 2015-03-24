<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\AlantraPage;
use App\Models\Testimonial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Models\PageImage;


class AlantraPageController extends Controller {

    public function __construct()
    {

    }


    /**
     * Show the home page
     *
     * @return mixed
     */
    public function showHome()
    {
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;
        $fragments = array();

        $results = DB::table('pages')->where('slug', '=', "home")->get();

        foreach ($results as $result)
        {
            $active = $result->active;

            if (($active > 0) || ((Auth::check()) && (Auth::user()->access_level == 3)))
            {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en"))
                {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = AlantraPage::find($result->id)->fragments;
                } else
                {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = AlantraPage::find($result->id)->fragments;
                }

            }
        }

        $testimonials = Testimonial::orderByRaw("RANDOM()")->take(3)->get();

        return View::make('vcms5::home')
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id)
            ->with('fragments', $fragments)
            ->with('testimonials', $testimonials);
    }


    /**
     * Save edited page (called via ajax)
     *
     * @return string
     */
    public function savePage()
    {
        if (Auth::user()->hasRole('pages'))
        {

            $validator = null;

            if (Session::get('lang') == "en")
            {
                $update_rules = array(
                    'thedata'      => 'required|min:2',
                    'thetitledata' => 'required|min:2|unique:pages,page_title,' . Input::get('page_id')
                );
            } else if (Session::get('lang' == 'fr'))
            {
                $update_rules = array(
                    'thedata'      => 'required|min:2',
                    'thetitledata' => 'required|min:2|unique:pages,page_title_fr,' . Input::get('page_id')
                );
            } else
            {
                $update_rules = array(
                    'thedata'      => 'required|min:2',
                    'thetitledata' => 'required|min:2|unique:pages,page_title_es,' . Input::get('page_id')
                );
            }
            $validator = Validator::make(Input::all(), $update_rules);

            if ($validator->passes())
            {

                $page = Page::find(Input::get('page_id'));
                if (Session::get('lang') == "fr")
                {
                    $page->page_content_fr = trim(Input::get('thedata'));
                    $page->page_title_fr = trim(Input::get('thetitledata'));
                    $page->slug_fr = Str::slug(Input::get('thetitledata'));
                } else if (Session::get('lang') == 'es')
                {
                    $page->page_content_es = trim(Input::get('thedata'));
                    $page->page_title_es = trim(Input::get('thetitledata'));
                    $page->slug_es = Str::slug(Input::get('thetitledata'));
                } else if (Session::get('lang') == 'en')
                {
                    $page->page_content = trim(Input::get('thedata'));
                    $page->page_title = trim(Input::get('thetitledata'));
                    $page->slug = Str::slug(Input::get('thetitledata'));
                } else {
                    return Session::get('lang') . " is an invalid language";
                }

                $page->save();
                Cache::flush();

                return "Page updated successfully";
            } else
            {
                return "Error!";
            }
        }
    }


    /**
     * Show a page
     *
     * @return mixed
     */
    public function showPage()
    {
        $slug = Request::segment(1);
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;
        $images = null;

        $results = DB::table('pages')->where('slug', '=', $slug)->get();

        foreach ($results as $result)
        {
            $active = $result->active;
            if (($active > 0) || ((Auth::check()) && (Auth::user()->hasRole('pages'))))
            {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en"))
                {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                } else
                {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $images = AlantraPage::find($page_id)->images;
                }

            }
        }

        return View::make('vcms5::public.inside')
            ->with('images', $images)
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id);
    }


    /**
     * List all pages
     *
     * @return mixed
     */
    public function getAllPages()
    {
        $pages = AlantraPage::where('active', '=', '1')->orderby('page_title')->get();

        return View::make('vcms5::admin.pages-list-all')
            ->with('allpages', $pages)
            ->with('page_name', '');
    }


    /**
     * Show page for edit or add
     *
     * @return mixed
     */
    public function getEditpage()
    {
        $page_id = Input::get('id');
        if ($page_id > 0)
        {
            $page = Page::find($page_id);
        } else
        {
            $page = new Page;
        }

        return View::make('vcms5::admin.pages-edit-page')
            ->with('page_id', $page_id)
            ->with('page', $page);
    }


    /**
     * Save edited page
     *
     * @return mixed
     */
    public function postEditpage()
    {
        $page_id = Input::get('page_id');
        if ($page_id > 0)
        {
            $page = Page::find($page_id);
        } else
        {
            $page = new Page;
        }

        $page->page_title = trim(Input::get('page_title'));
        $page->active = Input::get('active');
        $page->page_content = trim(Input::get('page_content'));
        $page->meta = Input::get('meta');
        $page->meta_tags = Input::get('meta_tags');
        $page->slug = Str::slug(trim(Input::get('page_title')));

        if (Input::has('page_title_fr'))
        {
            $page->page_title_fr = Input::get('page_title_fr');
            $page->page_content_fr = Input::get('page_content_fr');
            $page->slug = Str::slug(trim(Input::get('page_title')));
        }

        if (Input::has('page_title_es'))
        {
            $page->page_title_es = Input::get('page_title_es');
            $page->page_content_es = Input::get('page_content_es');
            $page->slug_es = Str::slug(trim(Input::get('page_title_es')));
        }

        Cache::flush();
        $page->save();

        return Redirect::to('/admin/page/all-pages')->with('message', 'Page saved successfully');
    }

    /**
     * Delete a page
     *
     * @return mixed
     */
    public function getDeletePage()
    {
        $item = Page::find(Input::get('id'));
        $item->delete();

        return Redirect::to('/admin/page/all-pages')
            ->with('message', 'Page deleted');
    }


    /**
     * Delete an image from a page
     *
     * @return mixed
     */
    public function getDeletePageImage()
    {
        $product = PageImage::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/page/page?id=' . Input::get('pid'));
    }

}
