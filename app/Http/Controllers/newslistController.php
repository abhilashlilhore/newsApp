<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use  App\Models\newsModel;
// use App\Models\comment;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class newslistController extends Controller
{
    //
    // function newslist(){
    //     $AllNewsss= Http::get("https://newsapi.org/v2/everything?q=Apple&from=2022-02-03&sortBy=popularity&apiKey=69007ef7abe34ecca8f5c0d37e72f074");

    //     return view('all_news',['collection'=>$AllNewsss['articles']]);

    // }

    function newslist()
    {

        // $AllNewsss = Http::get("https://newsapi.org/v2/everything?q=bitcoin&apiKey=7be2d888ece947ea8e884c051791fb90");


       

        // foreach ($AllNewsss['articles'] as $key => $value) {

        //     $user = newsModel::where('Title', '=', $value['title'])->first();
        //     if ($user === null) {

        //         $add_a_news = new newsModel;
        //         $add_a_news->Source = $value['source']['name'];
        //         $add_a_news->Sourceid = !empty($value['source']['id']) ? $value['source']['id'] : '';
        //         $add_a_news->Author = !empty($value['author']) ? $value['author'] : '';
        //         $add_a_news->Title = $value['title'];
        //         $add_a_news->Description = $value['description'];
        //         $add_a_news->Url = $value['url'];
        //         $add_a_news->urlToImage = $value['urlToImage'] ? $value['urlToImage'] : '';
        //         $add_a_news->Published = $value['publishedAt'];
        //         $add_a_news->Content = $value['content'];
        //         $add_a_news->save();
              
        //     }
            

        // }

       

        // return redirect('show_newslist');

        $AllNewsss = newsModel::orderBy('Published','DESC')->paginate(6);
        // return $AllNewsss;

        return view('all_news', ['collection' => $AllNewsss]);
    }


    // function show_newslist()
    // {

    //     $AllNewsss = newsModel::orderBy('Published','ASC')->paginate(6);
    //     // return $AllNewsss;

    //     return view('all_news', ['collection' => $AllNewsss]);
    // }

    function read_more($id)
    {

        $show_more = newsModel::find($id);
        $shocomment = DB::table('comments')->where('news_id', $id)->orderBy('id', 'desc')->get();

        $AllNewsss = newsModel::orderBy('Published','ASC')->paginate(3);



        //  return $shocomment;

        return view('read_more_news', ['collection' => $show_more, 'comment11' => $shocomment, 'AllNewsss' => $AllNewsss]);
    }
}
