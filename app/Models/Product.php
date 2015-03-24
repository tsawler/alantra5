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
        return $this->hasOne('ProductCategory', 'id', 'category_id');
    }


    /**
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }


    /**
     * @return mixed
     */
    public function drawings()
    {
        return $this->hasMany('ProductDrawing', 'product_id', 'id');
    }

}
