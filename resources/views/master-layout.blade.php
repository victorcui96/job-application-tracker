<!-- Stored in resources/views/layouts/master-layout.blade.php -->
<!-- This is the master layout file that all other blade view files will extend -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Job Tracker Application</title>
        <!-- Bootstrap core CSS -->
        <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />
        <!-- Bulma -->    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="/css/app.css">
       
    </head>

    <body>
        <div class="container">
            {{-- Any child views will defined their own content sections --}}
            @yield('content')
        </div>
        {{-- Every page will have the same master footer --}}
        @include('footer')
    </body>
    </html>