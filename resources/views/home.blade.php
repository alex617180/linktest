<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LinkTest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form class="form-inline my-2 my-lg-0" action="/" method="POST">
                @csrf
                <input type="url" class="form-control mr-sm-2" name="url" placeholder="Введите ссылку" required>
                <button class="btn btn-success my-2 my-sm-0">Получить</button>
            </form>
            <p>Короткая ссылка: </p>
            @if (isset($link))
                <a href="{{ $link }}">{{ $link }}</a>
            @endif
        </div>
    </body>
</html>
