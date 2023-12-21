<x-layout>
    <div class="homeImg">
        <img src="{{asset("images/homeImg.jpg")}}" alt="homeImg">
        <div class="homeTextImg">
            <h1>Nom d'équipe : {{$equipe['nomEquipe']}}</h1>
            <h2>Slogan : {{$equipe['slogan']}}</h2>
            <img src="../images/ornament1.svg" alt="ornament ">
            <h3>Localisation : {{$equipe['localisation']}}</h3>
        </div>
        <a href="#homeContent"><i class='bx bx-down-arrow-alt'></i></a>
    </div>
    <div class="container">
        <div class="equipe">
            {{-- <h2>Nom d'équipe : {{$equipe['nomEquipe']}}</h2>
            <h3>Slogan : {{$equipe['slogan']}}</h3>
            <h3>Localisation : {{$equipe['localisation']}}</h3> --}}
            <h3 class="h3mem">Membres de l'équipe : </h3>
                <ul>
                    <div class="cards2">
                        @foreach($equipe['membres'] as $membre)
                                <li>
                                    <div class="card2">
                                        <div class="card2i">
                                            <img src="{{$membre['image']}}" alt="avatar">
                                            <div>
                                                <h3 class="h3name">Nom : {{$membre['nom']}}</h3>
                                                <h3 class="h3name">Prénom : {{$membre['prenom']}}</h3>
                                            </div>
                                            <div>
                                                <h3 class="h3name">Liste des fonctions : </h3>
                                                <ul>
                                                @foreach($membre['fonctions'] as $fonction)
                                                    <li class="leli">{{$fonction}}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    </div>
                </ul>
                <h4>Autres informations : {{$equipe['autres']}}</h4>
                <img src="{{asset('storage/images/'.$equipe['logo'])}}" alt="logo">
            <iframe style="margin-bottom: 75px" width="560" height="315" src="https://www.youtube.com/embed/xmXYsTUOKyQ" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</x-layout>