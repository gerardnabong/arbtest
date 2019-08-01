<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    public $primarykey = 'id';
    public $timestamp = true;
}
