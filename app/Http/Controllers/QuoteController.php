<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Quote;

class QuoteController extends Controller {

    /**
     * @return mixed
     */
    public function getQuote()
    {
        $interested_in = "";
        if (Input::has('i')){
            $interested_in = urldecode(Input::get('i'));
        }
        return View::make('vcms5::quote')
            ->with('page_title', 'Request a Quote')
            ->with('meta_tags', '')
            ->with('interested_in', $interested_in)
            ->with('meta', '');
    }


    /**
     * @return mixed
     */
    public function postQuote()
    {
        $quote = new Quote;

        $quote->company = Input::get('company');
        $quote->full_name = Input::get('full_name');
        $quote->email = Input::get('email');
        $quote->phone = Input::get('phone');
        $quote->address = Input::get('address');
        $quote->city = Input::get('city');
        $quote->province = Input::get('province');
        $quote->date_needed = Input::get('date_needed');
        $quote->interested_in = Input::get('interested_in');
        $quote->message = Input::get('message');

        $quote->save();

        // build email
        $user = array(
            'email'   => Input::get('email'),
            'name'    => Input::get('full_name')
        );

        // the data that will be passed into the mail view blade template
        $data = array(
            'users_name'  => $user['name'],
            'the_message' => Input::get('message'),
            'email'       => Input::get('email')
        );

        // use Mail::send function to send email passing the data and using the $user variable in the closure
        Mail::later(5, 'emails.quote_email', $data, function ($message) use ($user)
        {
            $message->from('donotreply@alantraleasing.com', 'Do not reply');
            $message->to('melissa@alantraleasing.com')->subject('Request for Quotation from website');
        });

        return Redirect::to('/')->with('message', 'Your request has been delivered');
    }


    /**
     * @return mixed
     */
    public function getAllQuotes()
    {
        $quotes = Quote::orderBy('company')->get();

        return View::make('vcms5::admin.quotes-list-all-quotes')
            ->with('page_title', 'Requests for Quotation')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('quotes', $quotes);
    }


    /**
     * @return mixed
     */
    public function getQuoteForAdmin()
    {
        $id = Input::get('id');
        $quote = Quote::find($id);

        return View::make('vcms5::admin.quotes-show-quote')
            ->with('page_title', 'Request for Quotation')
            ->with('meta_tags', '')
            ->with('meta', '')
            ->with('quote', $quote);

    }


    /**
     * @return mixed
     */
    public function deleteQuoteForAdmin()
    {
        $id = Input::get('id');
        $quote = Quote::find($id);
        $quote->delete();

        return Redirect::to('/admin/quotes/all-quotes')
            ->with('message', 'Request for quotation deleted');
    }

}
