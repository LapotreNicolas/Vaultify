<footer>
    <div class="container">
        <div class="flexFooter">
            <div>
                <h2>Menu</h2>
                <a href="{{route('story.index')}}">Histoires</a>
                <a href="{{route('story.index')}}">Contact</a>
                @guest
                    <a href="{{route('register')}}">S'inscrire</a>
                    <a href="{{route('login')}}">Connexion</a>
                @endguest
                @auth
                    <a href="{{route('history.create')}}">Créer une histoire</a>
                @endauth
            </div>
            <img src="{{asset("images/logo.svg")}}" alt="logo" class="logoFooter">
        </div>
        <p>©2023 | Copyright | Les chevaliers de la &lt;table&gt;, Tous droits réservés</p>
    </div>
</footer>