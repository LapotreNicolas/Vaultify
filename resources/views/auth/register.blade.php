<x-layout>
    <img src="{{asset("images/Village.jpg")}}" class="logimg">
    <section class="log">
        <form action="{{route("register")}}" method="post" class="card">
            @csrf
            <h3>Inscription</h3>
            <input type="text" name="name" required placeholder="Name" /><br />
            <input type="email" name="email" required placeholder="Email" /><br />
            <input type="password" name="password" required placeholder="password" /><br />
            <input type="password" name="password_confirmation" required placeholder="password" /><br />
            <input type="submit" /><br />
        </form>
        Déjà un compte ? <a href="{{route("login")}}">Connectez vous</a>
    </section>
</x-layout>