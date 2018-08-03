@extends('template')
@section('content')
{{-- {{dd($data['hits'])}} --}}





<table id="customers">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>title</th>
          <th>Desc_th</th>
          <th>Tag</th>
        </tr>
        @foreach ($data['hits'] as $getdata )
        <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$getdata['_source']['name']}}</td>
                  <td> {{ $getdata['_source']['title']}}</td>
                  <td> {!! $getdata['_source']['desc_th']!!}</td>
            @if(!empty($getdata['_source']['tag']))
                 <td> {{ implode(',',$getdata['_source']['tag'])}}</td>
          
                @endif
        </tr>

        @endforeach
        {{-- <tr>
          <td>Alfreds Futterkiste</td>
          <td>Maria Anders</td>
          <td>Germany</td>
          <td>Germany</td>
        </tr>
     --}}
      </table>
      


















    {{-- <table id="customers">
            <tr>
                     <th>No.</th>
                    <th>title</th>
                    <th>Desc_th</th>
                    <th>Tag</th>
                
            </tr>
         @foreach ($data['hits'] as $getdata )
                  <th scope="row">{{$loop->iteration}}</th>
                
                  <td> {{ $getdata['_source']['title']}}</td>
              
          
                        <td> {{ $getdata['_source']['desc_th']}}</td>
                
     
                @if(!empty($getdata['_source']['tag']))
     
                    <td> {{ $getdata['_source']['tag'][0]}}</td>
          
                @endif
               

        @endforeach

    </table> --}}


@endsection