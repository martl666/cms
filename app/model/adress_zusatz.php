<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22.09.2018
 * Time: 21:12
 */

namespace model;

use Illuminate\Database\Eloquent\Model as Model;

class adress_zusatz extends Model
{
    protected $table = "adress_zusatz_info";
    protected $primaryKey = "adress_id";
    public $timestamps = false;

    public function address() {
        return $this->hasOne( "model\adresse", 'id' );
    }

}