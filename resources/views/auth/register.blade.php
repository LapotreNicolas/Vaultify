<x-layout>
    <div class="logimg">
        <img src="{{asset("images/Village.jpg")}}">
        <div class="card login">
            <form action="{{route("register")}}" method="post">
                @csrf
                <h3>Inscription</h3>
                <input type="text" name="name" required placeholder="Nom" />
                <input type="email" name="email" required placeholder="Email" />
                <input type="password" name="password" required placeholder="Mot de passe" />
                <input type="password" name="password_confirmation" required placeholder="Confirmation du mot de passe" />
                <input type="submit" />
            </form>
            <div class="bottomLog">
                <p>Déjà un compte ?</p>
                <a href="{{route("login")}}">Connectez vous</a>
            </div>
        </div>
    </div>
</x-layout>