<div>Ma super application</div>
<div>
    <button><a href="{{route('accueil')}}">🏛 Accueil</a></button>
    <button><a href="{{route('story.index')}}">Accès aux histoires</a></button>
    <button><a href="{{route('test-vite')}}">Test Vite</a></button>
        <button><a href="{{route('contact')}}">Contact</a></button>
</div>
@guest
    <div>
        <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
    </div>
@endguest
@auth
    <div>
        {{Auth::user()->name}}
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
