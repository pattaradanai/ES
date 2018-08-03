<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <style>
             .form-control-borderless {
                    border: none;
                }

                .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
                    border: none;
                    outline: none;
                    box-shadow: none;
                }
         </style>

        <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even){background-color: #f2f2f2}
        </style>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
        <div class="container">
                <br/>
                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10 col-lg-8">
                                            <form class="card card-sm" action="{{ route('essearch') }}" method="POST" >
                                                    {{ csrf_field() }}
                                            <div class="card-body row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <i class="fas fa-search h4 text-body"></i>
                                                </div>
                                                <!--end of col-->

                                            
                                                <!--end of col-->
                                              
                                                <div class="col">
                                                        <input class="form-control form-control-lg form-control-borderless" name="search" placeholder="Search topics or keywords">
                                                </div>
                                                <div class="col-auto">
                                                    <button  type="submit">Search</button>
                                                </div>
                               
                                                <!--end of col-->
                                            </div>
                                        </form>
                                    </div>
                                    <!--end of col-->
                                </div>
            </div>
    <body>
            @yield('content')
        
    </body>
</html>
