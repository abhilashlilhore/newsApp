<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class commentController extends Controller
{
    //
    function addcomment(Request $data){

        $table_cols=new comment;

        $table_cols->name=$data->name;
        $table_cols->email=$data->email;
        $table_cols->comment=$data->comment;
        $table_cols->news_id=$data->news_id;

        $table_cols->save();
        return ["msg"=>"Data Inserted","comment"=>$data->comment,"name"=>$data->name,"email"=>$data->email];
    }
}
