<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DB;
use App\Article;

class ElasticController extends Controller
{
    public  function createDB(){
     
        $DB = new DB();
        $DB ->id = "1159";
        $DB ->title = bcrypt("food");
        $DB ->body =  "KFC";
        $DB ->tags = "Deliverry";
        $DB ->save();
    }

    public function Test(){
        Article::addAllToIndex();
        $articles = Article::where('id', '<', 200)->get();
        $articles->addToIndex();
        Article::reindex()
        return
    }
}
