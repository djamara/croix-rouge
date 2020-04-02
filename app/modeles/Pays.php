<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    //
    protected $table = 'pays';
    protected $primarykey = 'idpays';
    public $incrementing = true;
    public $timestamp = false;
}
