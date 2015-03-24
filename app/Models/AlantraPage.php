<?php namespace App\Models;

class AlantraPage extends \Tsawler\Vcms5\Page {

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany('PageImage', 'page_id', 'id');
    }

}
