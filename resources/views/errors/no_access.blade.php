<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Whoa there !') }}</title>
    
    {{-- Styles --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">

    <style>
        body {
            background: #F7F7F7;
            font-family: 'Luckiest Guy', cursive;
            font-size: 36px;
            color: #595F67;
            padding: 40px;
            text-shadow: 3px 5px #D1D1D1;
        }
        .error_image {
            height: 300px;
            width: auto;       
        }
        .error_title {
            font-size: 46px;   
        }
        .error_link{
            cursor: pointer;
        }
    </style>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</head>
<body>

    <div class="container cage">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img src="{{ asset('images/sad_panda_1.png') }}" alt="Panda so sad" class="error_image">
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center error_title">
                You do not belong here !
            </div>
        </div>
    </div>

</body>
</html>