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
<body class="yellow_bg welcome_page body"
      x-data="{ theme: '{{ session('theme', 'light') }}' }"
      x-bind:class="theme + '-theme'"
      @theme-updated.window="theme = $event.detail[0].theme">

<h1 class="hidden">{{__('texts.sign_in_to_amorce')}}</h1>

<main class="flex welcome_page_content">

    <x-logo class="logo_large"/>

    <div class="flex welcome_page_content_button_and_themes">

        <livewire:theme-switcher/>

        <a class="button welcome_page_content_button_and_themes_button hel_bold" href="{{route('login')}}"
           title="Aller vers la page de connection à l'Amorce">{{__('texts.sign_in')}}</a>

    </div>

</main>

</body>
</html>
