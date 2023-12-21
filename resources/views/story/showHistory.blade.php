@php
    $parsedown = new Parsedown();
@endphp
<x-layout titre="Affiche une histoire">
    <div class="topImg">
        <img src="{{asset("images/topImg.jpg")}}" alt="topImg">
        <div>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
            <h1>{{$histoire->titre}}</h1>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
        </div>
    </div>
    <div class="bgBlack">
        <div class="container showHistory">
            <div class="desc">
                <h2>Description de l'histoire</h2>
                <p>{{$histoire->pitch}}</p>
            </div>
            <div class="genre">
                <h2>Genre</h2>
                <p>{{$histoire->genre['label']}}</p>
            </div>
            <div class="img">
                <img class="image" src="{{asset($histoire->photo)}}" alt="image">
            </div>
            <a href="{{route('story.showChapter',['chapter_id' => $id_chapitre])}}" class="start">Commencer l'Histoire</a>
            <div>
                @if($action == 'delete')
                    <form action="{{route('story.destroy',$histoire->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div>
                            <button type="submit" name="delete" value="valide">Valide</button>
                            <button type="submit" name="delete" value="annule">Annule</button>
                        </div>
                    </form>
                @else
                    <div>
                        <a href="{{route('story.index')}}" class="list">Retour à la liste</a>
                    </div>
                @endif
            </div>
            <div>


                <div>
                    {{--Nombre de lecture terminer--}}
                    <div class="stats">
                        <p>
                            Total de lectures terminées : <span>{{$terminer}}</span>
                        </p>
                        <p>
                            Nombre d'avis positifs : <span>{{$avis}}</span>
                        </p>
                    </div>
                    @auth()
                    <form action="{{route('storeAvis')}}" method="post" class="card commentForm">
                        @csrf
                        <input name="h_id" value="{{$histoire->id}}" type="hidden">
                        <label for="contenu"></label>
                        <textarea name="contenu" id="contenu" rows="6" placeholder="Ecrivez un commentaire" required></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                    @endauth
                </div>
    
    
                <!-- Commentaires ici-->
                <div class="comments">
                    @foreach($commentaires as $com)
                        <div>
                            <p><img src="{{asset('storage/images/'.$com->user->avatar)}}" alt="avatar"> Par {{$com->user->name}} :</p>
                            <p>{{$com->contenu}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>