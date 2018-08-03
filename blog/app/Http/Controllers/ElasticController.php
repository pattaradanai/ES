<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DB;
use App\Article;

class ElasticController extends Controller
{
    public function up()

    {
       $test =  Article::putMapping($ignoreConflicts = true);
       dd($test);
    }
}
