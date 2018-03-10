<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-TPS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-app>
        <app-tool></app-tool>
        <v-content app>
            <v-container fill-height grid-list-md>
                <router-view></router-view>
            </v-container> 
        </v-content>
        </v-app>
    </div>

    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>