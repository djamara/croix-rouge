<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    //
    protected $table = "comite";
    protected $primarykey = 'personne_immat';
    protected $keyType = 'string';
    public $incrementing = true;
    public $timestamp = false;
}
