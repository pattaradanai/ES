<?php
    require 'vendor/autoload.php';
    $hosts = [
       'ip_address:9200'         // IP + Port
    ];
    $client = Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();

    $params = [
        'index' => 'my_index',
        'type' => 'my_type',
        'id' => 'my_id',
        'body' => ['testField' => 'abc']
    ];

    $response = $client->index($params);
?>