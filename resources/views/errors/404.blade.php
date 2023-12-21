<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main class="quatre">
    <a href="/"><img class="arrow" src="{{asset("images/arrow.svg")}}"></a>
    <div class="quatrecontainer">
        <div class="imgerreur">
        <img src="{{asset("images/Clef.svg")}}">
        <img src="{{asset("images/logo.svg")}}">
        </div>
        <h1>Vous vous êtes égarés du droit chemin...</h1>
    </div>
    <h6 class="erreur">Erreur 404</h6>
</main>

</body>
</html>
