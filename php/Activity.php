<?php

use Illuminate\Database\Eloquent\Model;
require_once 'vendor/autoload.php';

class Activity extends Model
{
    public $table = "activity";
    protected $fillable = ['id', 'title', 'address'];
    protected $dates = ['date'];

}
