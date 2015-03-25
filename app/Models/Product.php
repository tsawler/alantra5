<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public static $rules = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';


    /**
     * @return mixed
     */
    public function category()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'category_id');
    }


    /**
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }


    /**
     * @return mixed
     */
    public function drawings()
    {
        return $this->hasMany('App\Models\ProductDrawing', 'product_id', 'id');
    }

}
