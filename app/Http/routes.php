<?php

Route::get('/', function(){
    return Redirect::to('/home');
});

Route:: group(array('middleware' => 'auth.pages'), function () // make sure admin
{
    Route::post('/page/savepage', 'AlantraPageController@savePage');
    Route::get('/admin/page/all-pages', 'AlantraPageController@getAllPages');
    Route::get('/admin/page/page', 'AlantraPageController@getEditpage');
    Route::post('/admin/page/page', 'AlantraPageController@postEditpage');
    Route::get('/admin/page/deletepage', 'AlantraPageController@getDeletePage');
    Route::post('/page/savefragment', 'AlantraPageController@postSavefragment');
    Route::get('/admin/page/deletepageimage', 'AlantraPageController@getDeletePageImage');
});

Route:: group(array('middleware' => 'auth.products'), function () // make sure admin
{
    Route::get('/admin/products/all-products', 'ProductsController@getAllProducts');
    Route::get('/admin/products/product', 'ProductsController@getEditproduct');
    Route::post('/admin/products/product', 'ProductsController@postEditproduct');
    Route::get('/admin/products/deleteproduct', 'ProductsController@getDeleteproduct');
    Route::get('/admin/products/deleteproductimage', 'ProductsController@getDeleteProductImage');
    Route::get('/admin/products/deleteproductdrawing', 'ProductsController@getDeleteProductDrawing');
});

Route::group(array('before' => 'auth.quotes'), function ()
{
    Route::get('/admin/quotes/all-quotes', 'QuoteController@getAllQuotes');
    Route::get('/admin/quotes/quote', 'QuoteController@getQuoteForAdmin');
    Route::get('/admin/quotes/deletequote', 'QuoteController@deleteQuoteForAdmin');
});

Route::group(array('before' => 'auth.contacts'), function ()
{
    Route::get('/admin/contacts/list-all-website-contacts', 'ContactController@getAllWebsiteContacts');
    Route::get('/admin/contacts/contact', 'ContactController@getContactForAdmin');
    Route::get('/admin/contacts/deletecontact', 'ContactController@deleteContactForAdmin');
});

// here we wrap our package controllers in a namespace so we can call them directly
Route::group(['namespace' => 'App\Http\Controllers'], function(){

    // change language
    Route::get('/changelanguage', '\Tsawler\Vcms5\controllers\VcmsLanguageController@getChangeLanguage');

    // save menu state
    Route::get('/menuUp', '\Tsawler\Vcms5\controllers\VcmsUIController@menuUp');
    Route::get('/menuDown', '\Tsawler\Vcms5\controllers\VcmsUIController@menuDown');

    // events/calendar
    Route::get('/calendar', '\Tsawler\Vcms5\controllers\VcmsEventsController@showCal');
    Route::get('/events/jsonevents', '\Tsawler\Vcms5\controllers\VcmsEventsController@getJsonEvents');
    Route::get('/event/{id}/{title?}', '\Tsawler\Vcms5\controllers\VcmsEventsController@showEvent');
    
    // gallery
    Route::get('/gallery/{gallery?}', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getAllItems');
    
    // blog
    Route::get('/blogs/{blogpage}', '\Tsawler\Vcms5\controllers\VcmsBlogController@getBlog');
    Route::get('/blogs/post/{post}', '\Tsawler\Vcms5\controllers\VcmsBlogController@getPost');

    // login routes
    Route::get('/admin/login', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
    Route::get('/login', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
    Route::post('/admin/login', '\Tsawler\Vcms5\controllers\VcmsLoginController@postLogin');
    
    // news
    Route::get('/news/all', '\Tsawler\Vcms5\controllers\VcmsNewsController@index');
    Route::get('/news/{slug}', '\Tsawler\Vcms5\controllers\VcmsNewsController@showNews');

    // faq
    Route::get('/faqs', '\Tsawler\Vcms5\controllers\VcmsFaqController@showFaqs');
    
    // search
    Route::post('/search', '\Tsawler\Vcms5\controllers\VcmsSearchController@performSearch');

    /**
     * Admin routes
     */
    Route::group(array('middleware' => 'auth'), function () // make sure authenticated
    {
        Route:: group(array('middleware' => 'auth.admin'), function () // make sure admin
        {
            Route::get('/elfinder/ckeditor4', 'Barryvdh\Elfinder\ElfinderController@showCKeditor4');

            Route:: group(array('middleware' => 'auth.menus'), function () // make sure admin
            {
                // menus
                Route::get('/menu/menujson', '\Tsawler\Vcms5\controllers\VcmsMenuController@getMenujson');
                Route::get('/menu/ddmenujson', '\Tsawler\Vcms5\controllers\VcmsMenuController@getDdmenujson');
                Route::get('/menu/ddsortitems', '\Tsawler\Vcms5\controllers\VcmsMenuController@getDdsortitems');
                Route::get('/menu/sortitems', '\Tsawler\Vcms5\controllers\VcmsMenuController@getSortitems');
                Route::post('/menu/saveddmenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postSaveddmenuitem');
                Route::post('/menu/savemenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postSavemenuitem');
                Route::post('/menu/deletemenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postDeletemenuitem');
                Route::post('/menu/deleteddmenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postDeleteddmenuitem');
            });

            Route:: group(array('middleware' => 'auth.events'), function () // make sure admin
            {
                // events
                Route::get('/events/movedate', '\Tsawler\Vcms5\controllers\VcmsEventsController@getMoveDate');
                Route::get('/events/moveenddates', '\Tsawler\Vcms5\controllers\VcmsEventsController@getMoveEndDate');
                Route::post('/events/save_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@postSaveEvent');
                Route::get('/events/retrieve_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@retrieveEvent');
                Route::get('/events/delete_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@deleteEvent');
                Route::get('/admin/calendar', '\Tsawler\Vcms5\controllers\VcmsEventsController@showCalForAdmin');
                Route::get('/admin/jsoneventsadmin', '\Tsawler\Vcms5\controllers\VcmsEventsController@getJsonEventsForAdmin');
            });

            Route:: group(array('middleware' => 'auth.blogs'), function () // make sure admin
            {
                // blog
                Route::post('/admin/post/editinplace', '\Tsawler\Vcms5\controllers\VcmsPostsController@postEditInPlace');
                Route::get('/admin/blogs/all-blogs', '\Tsawler\Vcms5\controllers\VcmsBlogController@getAllBlogs');
                Route::get('/admin/blogs/blog', '\Tsawler\Vcms5\controllers\VcmsBlogController@getEditBlog');
                Route::post('/admin/blogs/blog', '\Tsawler\Vcms5\controllers\VcmsBlogController@postEditBlog');
                Route::get('/admin/blogs/deleteblog', '\Tsawler\Vcms5\controllers\VcmsBlogController@getDeleteBlog');
                Route::get('/admin/blogs/post', '\Tsawler\Vcms5\controllers\VcmsBlogController@getEditPost');
                Route::post('/admin/blogs/post', '\Tsawler\Vcms5\controllers\VcmsBlogController@postEditPost');
                Route::get('/admin/blogs/deletepost', '\Tsawler\Vcms5\controllers\VcmsPostsController@getDeletePost');
                Route::get('/admin/blogs/posts', '\Tsawler\Vcms5\controllers\VcmsPostsController@getAllPosts');
            });

            Route:: group(array('middleware' => 'auth.galleries'), function () // make sure admin
            {
                // galleries
                Route::get('/admin/galleries/all-galleries', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getAllGalleries');
                Route::get('/admin/galleries/gallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getEditGallery');
                Route::post('/admin/galleries/gallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@postEditGallery');
                Route::get('/admin/galleries/deletegallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getDeleteGallery');
                Route::post('/admin/galleries/save-gallery-item', '\Tsawler\Vcms5\controllers\VcmsGalleryController@postSaveItem');
                Route::get('/admin/galleries/deleteitem', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getDeleteItem');
                Route::get('/admin/galleries/retrieve_item', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getRetrieveItem');
            });

            Route:: group(array('middleware' => 'auth.users'), function () // make sure admin
            {
                // users
                Route::get('admin/users/all-users', '\Tsawler\Vcms5\controllers\VcmsUserController@getAllUsers');
                Route::get('admin/users/user', '\Tsawler\Vcms5\controllers\VcmsUserController@getEditUser');
                Route::post('admin/users/user', '\Tsawler\Vcms5\controllers\VcmsUserController@postEditUser');
                Route::post('admin/users/editroles', '\Tsawler\Vcms5\controllers\VcmsUserController@postEditUserRoles');
                Route::get('admin/users/deleteuser', '\Tsawler\Vcms5\controllers\VcmsUserController@getDeleteUser');
            });

            Route:: group(array('middleware' => 'auth.news'), function () // make sure admin
            {
                // news
                Route::post('/news/savenews', '\Tsawler\Vcms5\controllers\VcmsNewsController@saveNews');
                Route::get('/admin/news/all-newsitems', '\Tsawler\Vcms5\controllers\VcmsNewsController@getAllNews');
                Route::get('/admin/news/newsitem', '\Tsawler\Vcms5\controllers\VcmsNewsController@getEditnews');
                Route::post('/admin/news/newsitem', '\Tsawler\Vcms5\controllers\VcmsNewsController@postEditnews');
                Route::get('/admin/news/deletenews', '\Tsawler\Vcms5\controllers\VcmsNewsController@getDeleteNews');
            });

            Route:: group(array('middleware' => 'auth.faqs'), function () // make sure admin
            {
                // faqs
                Route::get('/admin/faqs/all-faqs', '\Tsawler\Vcms5\controllers\VcmsFaqController@getAllFaqs');
                Route::get('/admin/faqs/faq', '\Tsawler\Vcms5\controllers\VcmsFaqController@editFaq');
                Route::post('/admin/faqs/faq', '\Tsawler\Vcms5\controllers\VcmsFaqController@postEditFaq');
                Route::get('/admin/faqs/deletefaq', '\Tsawler\Vcms5\controllers\VcmsFaqController@deleteFaq');
            });

            // logout
            Route::get('/admin/logout', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogout');

            // admin dashboard
            Route::get('/admin/dashboard', '\Tsawler\Vcms5\controllers\VcmsAdminController@getDashboard');

            // profile
            Route::get('/admin/users/profile', '\Tsawler\Vcms5\controllers\VcmsProfileController@getProfile');
            Route::post('/admin/users/profile', '\Tsawler\Vcms5\controllers\VcmsProfileController@postProfile');
            Route::post('/admin/users/prefs/{id?}', '\Tsawler\Vcms5\controllers\VcmsProfileController@postPrefs');

            // error pages
            Route::get('/admin/unauthorized', '\Tsawler\Vcms5\controllers\VcmsAdminController@get403');
        });
    });


});

Route::get('/{pagename?}', 'AlantraPageController@showPage');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
