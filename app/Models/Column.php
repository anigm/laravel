<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Node;
class Column extends Node
{
    protected $fillable = ['id','title', 'parent_id'];
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog','id');
    }
}