<header {{ Route::currentRouteName() === "index" || Route::currentRouteName() === "accueil" ? 'class=absHeader' : '' }}>
    <div>
        <a href="{{route('story.index')}}">Histoires</a>
        <a href="{{route('contact')}}">Contact</a>
    </div>
    <a href="{{route('accueil')}}"><img src="{{asset("images/logo.svg")}}" alt="logo" class="imgHeader"></a>
    @guest
        <div>
            <a href="{{route('register')}}">S'inscrire</a>
            <a href="{{route('login')}}">Connexion</a>
        </div>
    @endguest
    @auth
        <div>
            <a href="{{route('story.create')}}">Créer une histoire</a>
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
