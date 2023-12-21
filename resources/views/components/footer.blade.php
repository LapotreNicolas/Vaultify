<footer>
    <div class="container">
        <div class="flexFooter">
            <div>
                <h2>Menu</h2>
                <a href="{{route('story.index')}}">Histoires</a>
                <a href="{{route('equipe.index')}}">Contact</a>
                @guest
                    <a href="{{route('register')}}">S'inscrire</a>
                    <a href="{{route('login')}}">Connexion</a>
                @endguest
                @auth
                    <a href="{{route('story.create')}}">Créer une histoire</a>
                @endauth
            </div>
            <a href="{{route("index")}}"><img src="{{asset("images/logo_text.svg")}}" alt="logo" class="logoFooter"></a>
        </div>
        <p>©2023 | Copyright | Les chevaliers de la &lt;table&gt;, Tous droits réservés</p>
    </div>
</footer>