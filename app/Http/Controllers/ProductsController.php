<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use App\Models\ProductImage;

class ProductsController extends Controller {

    /**
     * @return mixed
     */
    public function allProducts()
    {
        $products = Product::all();

        return View::make('products')
            ->with('page_title', 'Products')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('products', $products);
    }

    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        $products = Product::orderBy('title')->get();

        return View::make('vcms5::admin.products-list-all')
            ->with('page_title', 'Products')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('products', $products);
    }

    /**
     * @return mixed
     */
    public function getProductPublic()
    {
        $slug = Request::segment(2);
        $product_id = 0;

        $results = DB::table('products')->where('slug', '=', $slug)
            ->get();

        foreach ($results as $result)
        {
            $active = $result->active;
            if ($active > 0)
            {
                $product_id = $result->id;

            }
        }

        $drawings = Product::find($product_id)->drawings()->get();

        if ($product_id > 0)
        {
            $product = Product::find($product_id);
        } else
        {
            return Redirect::to('/error');
        }

        return View::make('product')
            ->with('page_title', '')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('drawings', $drawings)
            ->with('product', $product);

    }


    /**
     * @return mixed
     */
    public function getEditProduct()
    {
        if (Input::get('id') > 0)
        {
            $product = Product::find(Input::get('id'));
        } else
        {
            $product = new Product;
        }

        return View::make('vcms5.admin.products-edit-product')
            ->with('product_id', Input::get('id'))
            ->with('product', $product);
    }

    /**
     * @return mixed
     */
    public function postEditProduct()
    {
        $id = Input::get('product_id');
        $file = Input::file('image_name');
        $drawing_file = Input::file('drawing_name');

        if ($id > 0)
        {
            $product = Product::find($id);
        } else
        {
            $product = new Product;
        }

        $product->title = Input::get('title');
        $product->slug = Str::slug(Input::get('title'));
        $product->title_fr = Input::get('title_fr');
        $product->description = Input::get('description');
        $product->description_fr = Input::get('description_fr');
        $product->active = Input::get('active');
        $product->electric_heat = Input::get('electric_heat');
        $product->communications_panel = Input::get('communications_panel');
        $product->ac = Input::get('ac');
        $product->electric_mast = Input::get('electric_mast');
        $product->drawing_tables = Input::get('drawing_tables');
        $product->emergency_lights = Input::get('emergency_lights');
        $product->coat_hooks = Input::get('coat_hooks');
        $product->bulletin_boards = Input::get('bulletin_boards');
        $product->window_bars = Input::get('window_bars');
        $product->office_desks = Input::get('office_desks');
        $product->office_chairs = Input::get('office_chairs');
        $product->folding_chairs = Input::get('folding_chairs');
        $product->folding_tables = Input::get('folding_tables');
        $product->filing_cabinets = Input::get('filing_cabinets');
        $product->lockers = Input::get('lockers');
        $product->fridges = Input::get('fridges');
        $product->microwaves = Input::get('microwaves');
        $product->water_coolers = Input::get('water_coolers');
        $product->insurance = Input::get('insurance');

        $product->water_septic = Input::get('water_septic');
        $product->exhaust_fans = Input::get('exhaust_fans');
        $product->hot_water_heaters = Input::get('hot_water_heaters');
        $product->laundry_sink = Input::get('laundry_sink');
        $product->hand_dryers = Input::get('hand_dryers');
        $product->toilets = Input::get('toilets');
        $product->urinals = Input::get('urinals');
        $product->sinks = Input::get('sinks');

        $product->category_id = 1;
        $product->save();

        $id = $product->id;

        // handle image, if any
        if (Input::hasFile('image_name'))
        {
            $destinationPath = base_path() . '/public/product_images/';
            $filename = $file->getClientOriginalName();
            $upload_success = Input::file('image_name')->move($destinationPath, $filename);
            if (!File::exists($destinationPath . "thumbs"))
            {
                File::makeDirectory($destinationPath . "thumbs");
            }
            $thumb_img = Image::make($destinationPath . $filename);
            $height = $thumb_img->height();
            $width = $thumb_img->width();

            if (($height < Config::get('vcms5.min_img_height')) || ($width < Config::get('vcms5.min_img_width')))
            {
                return Redirect::to('/admin/products/product?id=' . $id)
                    ->with('error', 'Your image is too small. It must be at least '
                        . Config::get('vcms5.min_img_width')
                        . ' pixels wide, and '
                        . Config::get('vcms5.min_img_height')
                        . ' pixels tall!');
                File::delete($destinationPath . $filename);
                exit;
            }

            $thumb_img->fit(Config::get('vcms5.thumb_size'), Config::get('vcms5.thumb_size'))
                ->save($destinationPath . "thumbs/" . $filename);

            unset($thumb_img);
            $img = Image::make($destinationPath . $filename);

            $width = $img->width();
            if (($width > Config::get('vcms5.max_img_width')) || ($height > Config::get('vcms5.max_image_height')))
            {
                // this image is very large; we'll need to resize it.
                $img = $img->fit(Config::get('vcms5.max_img_width'), Config::get('vcms5.max_img_height'));
                $img->save();
            }

            if ($upload_success)
            {
                $item = new ProductImage;
                $item->product_id = $id;
                $item->image_name = $filename;
                $item->save();
            }

        }

        // handle drawing, if any
        if (Input::hasFile('drawing_name'))
        {
            $destinationPath = base_path() . '/public/product_drawings/';
            $filename = $drawing_file->getClientOriginalName();
            $upload_success = Input::file('drawing_name')->move($destinationPath, $filename);


            if ($upload_success)
            {
                $item = new ProductDrawing;
                $item->product_id = $id;
                $item->drawing_file = $filename;
                $item->active = 1;
                $item->drawing_title = Input::get('drawing_title');
                $item->save();
            }

        }

        if (Input::get('action') == 0)
            return Redirect::to('/admin/products/all-products');
        else
            return Redirect::to('/admin/products/product?id=' . $id);
    }


    /**
     * @return mixed
     */
    public function getDeleteproduct()
    {
        $product = Product::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/products/all-products');
    }


    /**
     * @return mixed
     */
    public function getDeleteProductImage()
    {
        $product = ProductImage::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/products/product?id=' . Input::get('pid'));
    }


    /**
     * @return mixed
     */
    public function getDeleteProductDrawing()
    {
        $product = ProductDrawing::find(Input::get('id'));
        $product->delete();

        return Redirect::to('/admin/products/product?id=' . Input::get('pid'));
    }

}
