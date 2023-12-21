<header {{ Route::currentRouteName() === "index" || Route::currentRouteName() === "accueil" ? 'class=absHeader' : '' }}>
    <div class="left">
        <a href="{{route('story.index')}}">Histoires</a>
        <a href="{{route('contact')}}">Contact</a>
    @auth
        <a href="{{route('history.create')}}">Créer une histoire</a>
    @endauth
    </div>
    <a href="{{route('accueil')}}"><img src="{{asset("images/logo.svg")}}" alt="logo" class="imgHeader"></a>
    @guest
        <div class="right">
            <a href="{{route('register')}}">S'inscrire</a>
            <a href="{{route('login')}}">Connexion</a>
        </div>
    @endguest
    @auth
<<<<<<< HEAD
        <div class="right">
=======
        <div>
            <a href="{{route('story.create')}}">Créer une histoire</a>
>>>>>>> adf5a334d9c7b60c2e9015b719a3175efb26f99a
            {{Auth::user()->name}}
            <a href="{{route('profil')}}">Profil</a>
            <a href="{{route("logout")}}"
            onclick="document.getElementById('logout').submit(); return false;">Logout</a>
            <form id="logout" action="{{route("logout")}}" method="post">
                @csrf
            </form>
        </div>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth
</header>
