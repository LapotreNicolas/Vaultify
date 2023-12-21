<x-layout>
    <div class="logimg">
        <img src="{{asset("images/Village.jpg")}}">
        <div class="card login">
            <form action="{{route("login")}}" method="post">
                @csrf
                <h3>Connexion</h3>
                <input type="email" name="email" required placeholder="Email" />
                <input type="password" name="password" required placeholder="Mot de passe" />
                <div class="remember">
                    <p>Se souvenir de moi</p>
                    <input type="checkbox" name="remember"   />
                </div>
                <input type="submit" />
                <div class="bottomLog">
                    <p>Pas de compte ?</p>
                    <a href="{{route("register")}}">Inscris-toi</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>