<!doctype html>
<html lang="fr"
      x-data="{ theme: '{{ session('theme') }}' }"
      x-bind:class="theme + '-theme'"
      @theme-updated.window="theme = $event.detail[0].theme">

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
<body class="yellow_bg welcome_page">

<h1 class="hidden">{{__('Se connecter à l\'Amorce')}}</h1>

<main class="flex welcome_page_content">

    <img src="{{asset('img/logo650x269.png')}}" alt="Logo de l'Amorce" width="650" height="269">

    <div class="flex welcome_page_content_button_and_themes">

        <livewire:theme-switcher/>

        <a class="button welcome_page_content_button_and_themes_button hel_bold" href="/se-connecter"
           title="Aller vers la page de connection à l'Amorce">{{__('Se connecter')}}</a>

    </div>

</main>

</body>
</html>
