<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model {

    public static $rules = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quotes';

}
