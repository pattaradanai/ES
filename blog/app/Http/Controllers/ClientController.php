<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastica\Client as  ElasticaClient;
use Elasticsearch\ClientBuilder;
use App\DB;
use App\course_frees;


class ClientController extends Controller
{
    protected $elasticsearch;
    protected $elastica;


    public function Test(){
        $hosts = [
            '172.19.0.3'
        ];
        $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();       
       
        // dd($client);
        $getDB = DB::where('id','1159')->first();

 
    

        $params = [
            'index' => 'user',
            'type' => 'DB',
            'id' => $getDB->id,
            'body' => ['testField' => 'abc']
        ];
        
        // $response = $client->index($params);
        //dd($response);
        $params = array();
        $params['index'] = 'user';
        $params['type'] = 'DB';
        $params['id'] = '1159';
        
        $result = $client->get($params);
        dd( $result);
        $testfild = $result['_source'];

        dd($testfild ['testField']);
 


        $params = [
            'index' => 'user',
            'type' => 'DB',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                          'term' => ['_id' => '1159']  
                        ]
                        
                    ]
                ]
            ]
        ];
    
        $params['body']['query']['bool']['must']['term']['_id'] = 1159;
        $response = $client->search($params);
        
        dd($response);
        $get = DB::where('id',$response)->first();
        



    

    
}
public function importDB(){
            $hosts = ['172.19.0.4'];
            $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                        ->setHosts($hosts)      // Set the hosts
                        ->build();     
                        
                        $params = [
                        'index' => 'tutorme',
                            'body' => [
                                    'settings'=> [
                                        'analysis'=> [
                                             'filter'=> [
                                                'Ngram'=> [
                                                    'type'=> 'edge_ngram',
                                                    'min_gram'=> 1,
                                                    'max_gram'=> 100
                                                ],
                                                'shingram' =>[
                                                    'type'=> 'shingle',
                                                    'min_shingle_size' => 2,
                                                    'max_shingle_size' => 10
                                                ]
                                            ],
                                                'analyzer'=> [
                                                    'my_analyzer'=> [ 
                                                            'type'=> 'custom',
                                                            'tokenizer'=> 'thai',
                                                            'filter'=> [
                                                                'lowercase',
                                                                'shingram',
                                                                'Ngram'
                                                            ],
                                                            "char_filter"=> [
                                                                "html_strip"
                                                            ]  
                                                     ]
                                                 ]
                                        ]
                                     ],
                            'mappings'=> [
                            'tutorme_map'=> [
                                'properties'=> [
                                    'id' =>[
                                        'type'  => 'text',
                                    
                                        
                                    ],
                                    'code'  => [
                                        'type' => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'standard'
                                    
                                    ],
                                    'title'  => [
                                        'type'  => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'standard'
                                    
                                    ],
                                    'thumbnail' => [
                                        'type' => 'text',
                                        
                                    ],
                                    'courseId' => [
                                        'type' => 'text',
                                        
                                    ],
                                    'duration' => [
                                        'type'=> 'text',
                                        
                                    
                                    ],
                                    'desc_th' => [
                                        'type'  => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'standard'
                                    
                                    ],
                                    'tag' => [
                                        'type' => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'standard'
                                    
                                    ],
                                    'total_view' => [
                                        'type' => 'text',
                                   
                                    ],
                                    'seeme_created_at'  => [
                                        'type'      => 'date',
                                        'format'    =>  'yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis'
                                  
                                    ],
                                    'clip_id' => [
                                        'type' => 'text',
                                 
                                    ],
                                    'hash_id' => [
                                        'type' => 'text',
                              
                                    ],
                                    'channel_id'=> [
                                        'type' => 'text',
                                    
                                    ],
                                    'name' =>[
                                        'type' => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'my_analyzer'
                                    ],
                                    'category' =>[
                                        'type' => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'my_analyzer'
                                    ],
                                    'category_sub' =>[
                                        'type' => 'text',
                                        'analyzer'=> 'my_analyzer', 
                                        'search_analyzer'=> 'my_analyzer'
                                    ]
                            
                                ]
                            ]
                        ]
                    ]
            ];

                                $response = $client->indices()->create($params);
                                dd($response);

                        }
public function addindex(){
    $hosts = ['172.19.0.4'];
    $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                ->setHosts($hosts)      // Set the hosts
                ->build();     
    //  $getDB = course_frees::all();

     $getDB  = course_frees::raw(function ($collection) {
        return $collection->aggregate([
            [
                '$lookup' => [
                    'from' => 'teachers',
                    'localField' => 'teacherId',
                    'foreignField'  => '_id',
                    'as' => 'teacher_data'
                ]
            ],
            [
                '$unwind' => '$teacher_data'
            ],[
                '$lookup' => [
                    'from' => 'categorys',
                    'localField' => 'categoryId',
                    'foreignField'  => '_id',
                    'as' => 'categoryId'
                ]
            ],
            [
                '$unwind' => '$categoryId'
            ],[
                '$lookup' => [
                    'from' => 'category_subs',
                    'localField' => 'categorySubId',
                    'foreignField'  => '_id',
                    'as' => 'categorySubdata'
                ]
            ],
            [
                '$unwind' => '$categorySubdata'
            ],
        ]);
    });



     
    foreach($getDB as $data) {
       
        if($data->status == '1'){
            $params['body'][] = [
                'index' => [
                    '_index' => 'tutorme',
                    '_type' => 'tutorme_map', 
                ]
            ];
            $params['body'][] = [
                'id' => $data->_id,
                'code' => $data->code,
                'title' => $data->title,
                'thumbnail' => $data->thumbnail,
                'courseId' => $data->courseId,
                'duration' => $data->duration,
                'desc_th' => $data->desc_th,
                'tag' => $data->tag,
                'total_view' => $data->total_view,
                'seeme_created_at' => $data->seeme_created_at ? $data->seeme_created_at->timestamp*1000 : null,
                'clip_id' => $data->clip_id,
                'hash_id' => $data->hash_id,
                'channel_id' => $data->channel_id,
                'name' => $data->teacher_data->name,
                'category' => $data->categoryId->name_th,
                'category_sub' => $data->categorySubdata->name_th
            ];
        }
       
    }

   $responses = $client->bulk($params);
    dd($responses);


}

public function search(Request $request){
    
    $hosts = ['172.19.0.4'];
    $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                ->setHosts($hosts)      // Set the hosts
                ->build();  

                
                $search = $request -> input('search');
                $params = [
                    'from' => 0, 'size' => 100,
                    'index' => 'tutorme',
                    'type' => 'tutorme_map',
                    'body' => [
                        'query' => [
                                'bool' =>[
                                    'should' =>[
                                        ['match' => ['title' => $search]],
                                        ['match' => ['desc_th' => $search]],
                                        ['match' => ['tag' => $search]],
                                        ['match' => ['name' => $search]],
                                        ['match' => ['category' => $search]],
                                        ['match' => ['category_sub' => $search]]

                                    ],
                                        'minimum_should_match' => 1
                                            ]
                                    ]
                                ]
                        ];

               
                $response = $client->search($params);
       
                return view('search', [
                    'data' => $response['hits']
                    
                ]);

    }
}

