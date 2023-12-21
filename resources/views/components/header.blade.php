<header>
    <div class="left">
        <a href="{{route('story.index')}}">Histoires</a>
        @auth
            <a href="{{route('story.create')}}">Créer une histoire</a>
        @endauth
    </div>
    <a href="{{route('accueil')}}"><img src="{{asset("images/logo.svg")}}" alt="logo" class="imgHeader"></a>
    <div class="right">
        @guest
                <a href="{{route('register')}}">S'inscrire</a>
                <a href="{{route('login')}}">Connexion</a>
        @endguest
        @auth
            <a href="{{route('profil')}}">{{Auth::user()->name}}</a>
            <a href="{{route("logout")}}" onclick="document.getElementById('logout').submit(); return false;">Logout</a>
            <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
            </form>
        @endauth
    </div>
    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            document.getElementById('logout-form').submit();
        });
    </script>
</header>
