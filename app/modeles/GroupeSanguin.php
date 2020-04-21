<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class GroupeSanguin extends Model
{
    //
    protected $table = 'groupesanguin';
    protected $primarykey = 'idGroupeSanguin';
    public $incrementing = true;
    public $timestamp = false;
}
