
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - {{ env('APP_NAME') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/3.4.1/spacelab/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-default">
            <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Companies <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ action('CompaniesController@index') }}">All Companies</a></li>
                        <li><a href="{{ action('CompaniesController@suppliers') }}">Suppliers</a></li>
                        <li><a href="{{ action('CompaniesController@customers') }}">Customers</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ action('CompaniesController@create') }}">+ add new company</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/about">About</a>
                </li>
                <li>
                    <a href="/credits">Credits</a>
                </li>
            </ul>
        </div>
        <ol class="breadcrumb">
            @section('breadcrumbs')
            <li><a href="/">Home</a></li>
            @show
        
        </ol>
        
        {{-- MESSAGES --}}
        @if( session('success') )
            <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="alert alert-success">
                            <h4>Well done!</h4>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                    
                </div>
            
            </div>
        @endif
        
        @if($errors->count())
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="alert alert-danger">
                            <h4>Something were wrong!</h4>
                            <p>please check for errors below</p>
                        </div>
                    </div>
                </div>
                
            </div>
        @endif

        <div class="container">
        
            @yield('content')
        
        </div>
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
