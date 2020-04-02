<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    //
    protected $table = "personne";
    protected $primarykey = 'idpersonne';
    public $incrementing = true;
    public $timestamp = false;
    
}
