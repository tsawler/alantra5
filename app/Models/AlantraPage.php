<?php namespace App\Models;

class AlantraPage extends \Tsawler\Vcms5\models\Page {

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany('App\Models\PageImage', 'page_id', 'id');
    }

}
