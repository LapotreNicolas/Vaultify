<x-layout>
    <h2>Nom d'équipe : {{$equipe['nomEquipe']}}</h2>
    <h3>Slogan : {{$equipe['slogan']}}</h3>
    <h3>Localisation : {{$equipe['localisation']}}</h3>
    <h3>Membres de l'équipe : </h3>
    <ul>
        @foreach($equipe['membres'] as $membre)
            <li>
                <h3>Nom : {{$membre['nom']}}</h3>
                <h3>Prénom : {{$membre['prenom']}}</h3>
                <img src="{{$membre['image']}}" alt="avatar">
                <h3>Liste des fonctions : </h3>
                <ul>
                @foreach($membre['fonctions'] as $fonction)
                    <li>{{$fonction}}</li>
                @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    <h4>Autres informations : {{$equipe['autres']}}</h4>
    <img src="{{$equipe['logo']}}" alt="logo">
</x-layout>