<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Note;
class Mypublic extends Model
{
    public static function archives()
    {
        $data = Note::select(DB::raw('DATE_FORMAT(updated_at, %Y) weeks,COUNT(id) COUNT'))
            ->groupBy('weeks')
            ->get();
        return $data;
    }
}


//SELECT DATE_FORMAT(updated_at, '%Y') weeks,COUNT(id) COUNT FROM	notes GROUP BY	weeks;