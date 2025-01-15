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

<body class="body flex"
      x-data="{ theme: '{{ session('theme', 'light') }}', openMarginLeft: '16.8125em', closeMarginLeft: '6.50em', marginLeft: '16.8125em' }"
      x-bind:class="theme + '-theme'"
      @theme-updated.window="theme = $event.detail[0].theme"
      @toggle-nav.window="marginLeft = $event.detail[0].isNavVisible ? openMarginLeft : closeMarginLeft">

<h1 class="hidden">Amorce</h1>

<div class="layout flex">

    <header class="header">
        <livewire:navigations.main/>
    </header>

    <main class="main" x-bind:style="{ marginLeft: marginLeft }">
        {{$slot}}
    </main>

</div>

<x-footer/>

</body>
</html>
