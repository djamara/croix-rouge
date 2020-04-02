<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $table = 'commune';
    protected $primarykey = 'idcommune';
    public $incrementing = true;
    public $timestamp = false;
}
