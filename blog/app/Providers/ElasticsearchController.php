<?php
namespace App\Providers;


use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Elasticsearch\ClientBuilder;
use Elasticquent\ElasticquentTrait;

require 'vendor/autoload.php';


class Book extends Eloquent
{
    use ElasticquentTrait;
}