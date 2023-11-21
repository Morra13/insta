<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, innitial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'title') }}</title>
    <link rel="stylesheet" href="{{asset('storage')}}/css/normalize.css">
    <link rel="stylesheet" href="{{asset('storage')}}/css/style.css">
</head>
<body class="page">
<header class="header">

</header>
<main class="main">

    @yield('content')

</main>
</body>
</html>
