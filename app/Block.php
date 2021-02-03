<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use \Esensi\Model\Model;

class Block extends Model
{
    public $primaryKey = 'id';
    public $table = 'blocks';
    public $fillable = ['title', 'content', 'imagepath', 'topicid','created_at', 'updated_at'];

    protected $rules = [
        'title'=>['required', 'max: 128'],
        'content'=>['required'],
    ];
}
