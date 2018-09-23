<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22.09.2018
 * Time: 21:09
 */

namespace model;

use Illuminate\Database\Eloquent\Model as Model;

class kunden extends Model
{
    protected $table = "kunden";
    public $timestamp = false;

    public function orders() {
        return $this->hasMany( "model\bestellung");
    }

}