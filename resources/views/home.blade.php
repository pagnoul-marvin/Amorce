<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p>coucou</p>

<form method="POST" action="{{route('logout')}}">

    @csrf

    <button type="submit" class="underline text-white uppercase tracking-wider">

        {{__('Logout')}}

    </button>

</form>
</body>
</html>
