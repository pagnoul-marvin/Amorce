<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Marvin Pagnoul">
    <meta name="keywords" content="Amorce, Liège, Association">
    <meta name="description" content="L'application web de l'Amorce">
    <title>Amorce</title>
    @vite('resources/css/app.css')
</head>
<body class="body" x-bind:class="{{ session('theme') }} + '-theme'">

<h1 class="hidden">{{__('Se connecter à l\'Amorce')}}</h1>

<main>

    <x-buttons.go-back-button/>

    {{$slot}}

</main>

</body>
</html>
