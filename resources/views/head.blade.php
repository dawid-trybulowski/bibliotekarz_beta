@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href={{url('/') .'/css/bootstrap.min.css'}}>
        <link type="text/javascript" href={{url('/') .'/js/bootstrap.js'}}>
        <link type="text/javascript" href={{url('/') .'/js/app.js'}}>
        <link rel="stylesheet" href={{url('/') .'/css/fontawesome-all.min.css'}}>
        <link rel="stylesheet" href={{url('/') .'/css/style.css'}}>
        <script defer src={{url('/') .'/js/fontawesome-all.min.js'}}></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <title>Document</title>
    </head>
@endsection