<x-layout titre="titre">
    <div class="homeImg">
        <img src="{{asset("images/homeImg.jpg")}}" alt="homeImg">
        <div class="homeTextImg">
            <h1>Vaultify</h1>
            <h2>Héros, Monstres, Trésors, Aventure!</h2>
            <img src="images/ornament1.svg" alt="ornament ">
            <h3>Explorez un monde où les légendes prennent vie, où les dragons règnent en maîtres et où des héros intrépides se dressent contre l'obscurité. Préparez-vous à être transporté dans un univers où l'héritage de chaque dragon résonne à travers les âges</h3>
        </div>
        <a href="#homeContent"><i class='bx bx-down-arrow-alt'></i></a>
    </div>
    <div id="homeContent">
        <div class="container">
            <div class="discoverStory">
                <h2 class="titleSection">Découvrir les histoires</h2>
                <div class="cards">
                    @foreach($histoires as $histoire)
                        <div class="card">
                            <div class="titleCard">
                                <img src="{{Storage::url('images/'.$histoire->user->avatar)}}" alt="avatar">
                                <div class="headCard">
                                    <h3>{{$histoire->titre}}</h3>
                                    <a href="{{route('users.show',$histoire->user->id)}}">Par {{$histoire->user->name}}</a>
                                </div>
                            </div>
                            <div class="contentCard">
                                <p>{{$histoire->pitch}}</p>
                            </div>
                            <div class="buttonCard">
                                <a href="{{route('story.show', [$histoire->id, 'action' => 'show'])}}">Lire</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{route('story.index')}}" class="viewAllHome">Voir toutes les histoires</a>
            </div>
            <div class="createStory">
                <h2 class="titleSection">Crée ton histoire</h2>
                <p>Forgez des aventures épiques, créez des héros inoubliables, et partagez vos récits fantastiques avec la communauté. Prêt à donner vie à votre imagination dans l'univers de Donjon & Dragon ? Commencez votre aventure ici !</p>
                <a href="{{route('story.create')}}" class="createHome">Créer mon histoire</a>
            </div>
        </div>
    </div>
</x-layout>