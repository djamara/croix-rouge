<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    //
    protected $table = 'fonctioncr';
    protected $primarykey = 'idfonctionCR';
    public $incrementing = true;
    public $timestamp = false;
}
