
    'query' => [
       'bool' =>[
         'should' =>[
           [
             'match' => [
               'title' => '..'
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
    
  
