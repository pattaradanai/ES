
    // $params = [
    //     'index' => 'analysissub',
    //     'type' => '_doc',
    //     'id' => 1,
    //     'body' => [
    //     'title' => 'Less Less Less is Style',
    //     'des' => 'abcdefg',
    //     'url' => 'https://seeme.me/ch/englishafternoonz/M2aO89',
    //     'view' => 'view',
    //     'code' => 'qH5mYp0sa',
    //     'duration' => '199'

        
        
    //                 ]
    // ];


public function search(){
    $hosts = [
        '172.19.0.4'
    ];
    $client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                ->setHosts($hosts)      // Set the hosts
                ->build();  
                
                
                $params = [
                    'index' => 'analysissub',
                    'type' => '_doc',
                    'body' => [
                        'query' => [
                            'bool' =>[
                              'should' =>[
                                [
                                  'match' => [
                                    'title' => 'L'
                                  ]
                                ],
                                [
                                  'match' => [
                                    'des' => 'www'
                                  ]
                                ]
                                ],
                                'minimum_should_match' => 1
                            ]
                           
                           ]
                    ]
                ];

               // $params['body']['query']['bool']['must']['term']['_id'] = 1159;
                $response = $client->search($params);
                
                dd($response);
               
                mongoimport --db test --collection inventory 
                    --file ~/Downloads/inventory.crud.json

                mongoimport --db teachers --collection collectionName --file /Users/billz/Desktopteachers.json --jsonArray
    


}

$params = [
            'index' => 'tutorme',
            'body' => [
                'mappings' => [
                    'course_frees' => [
                        '_source' => [
                            'enabled' => true
                        ],
                        'properties' => [
                            'code'              => [
                                'type'  => 'text'
                            ],
                            'title'             => [
                                'type'      => 'text',
                                'analyzer'  => 'thai'
                            ],
                            'thumbnail'         => [
                                'type'      => 'text'
                            ],
                            'courseId'          => [
                                'type'      => 'text'
                            ],
                            'duration'          => [
                                'type'      => 'integer'
                            ],
                            'desc_th'           => [
                                'type'      => 'text',
                                'analyzer'  => 'thai'
                            ],
                            'tag'               => [
                                'type'      => 'text',
                                'analyzer'  => 'thai'
                            ],
                            'total_view'        => [
                                'type'      => 'integer'
                            ],
                            'seeme_created_at'  => [
                                'type'      => 'date',
                                'format'    =>  'yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis'
                            ],
                            'clip_id'           => [
                                'type'      => 'text'
                            ],
                            'hash_id'           => [
                                'type'      => 'text'
                            ],
                            'channel_id'        => [
                                'type'      => 'integer'
                            ],
                        ]
                    ]
                ]
            ]
        ];

        'settings'=> [
                                    'analysis'=> [
                                        'filter'=> [
                                            'autocomplete_filter'=> [
                                                'type'=> 'edge_ngram',
                                                'min_gram'=> 1,
                                                'max_gram'=> 100
                                            ]
                                        ],
                                        'analyzer'=> [
                                            'autocomplete'=> [ 
                                                'type'=> 'custom',
                                                'tokenizer'=> 'thai',
                                                'filter'=> [
                                                'lowercase',
                                                'autocomplete_filter'
                                                ]
                                            ]
                                        ]
                                    ]
                                    ],

 {
   $lookup:
     {
       from: <course_frees>,
       localField: <teacherId>,
       foreignField: <teachers>,
       as: <_id>
     }
}