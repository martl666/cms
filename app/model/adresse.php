<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22.09.2018
 * Time: 21:12
 */

namespace model;

use Illuminate\Database\Eloquent\Model as Model;

class adresse extends Model
{
    protected $table = "adresse";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function customer() {
        return $this->hasOne( "model\kunden", "id" );
    }

    public function addressDetails() {
        return $this->hasOne("model\adress_zusatz", "adress_id");
    }
}