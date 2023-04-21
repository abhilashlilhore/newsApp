<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use  App\Models\newsModel;


class everyTenMinut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenminut:updatenews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update news table in every 10 minuts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $AllNewsss = Http::get("https://newsapi.org/v2/everything?q=bitcoin&apiKey=7be2d888ece947ea8e884c051791fb90");


       

        foreach ($AllNewsss['articles'] as $key => $value) {

            $user = newsModel::where('Title', '=', $value['title'])->first();
            if ($user === null) {

                $add_a_news = new newsModel;
                $add_a_news->Source = $value['source']['name'];
                $add_a_news->Sourceid = !empty($value['source']['id']) ? $value['source']['id'] : '';
                $add_a_news->Author = !empty($value['author']) ? $value['author'] : '';
                $add_a_news->Title = $value['title'];
                $add_a_news->Description = $value['description'];
                $add_a_news->Url = $value['url'];
                $add_a_news->urlToImage = $value['urlToImage'] ? $value['urlToImage'] : '';
                $add_a_news->Published = $value['publishedAt'];
                $add_a_news->Content = $value['content'];
                $add_a_news->save();
              
            }
            

        }

        
    }
}
