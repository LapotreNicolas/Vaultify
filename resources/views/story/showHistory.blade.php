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
        <div>
            <h2>Description de l'histoire</h2>
            <p>{!!$parsedown->text($histoire->pitch)!!}</p>
        </div>
        <p>Genre : {{$histoire->genre['label']}}</p>
        <div>
            <img class="image" src="{{asset($histoire->photo)}}" alt="image">
        </div>
        <a href="{{route('story.showChapter',['chapter_id' => $id_chapitre])}}"><button>Commencer l'Histoire</button></a>
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
                    <a href="{{route('story.index')}}">Retour à la liste</a>
                </div>
            @endif
        </div>
        <div>


            <div>
                @auth()
                <form action="{{route('storeAvis')}}" method="post">
                    @csrf
                    <input name="h_id" value="{{$histoire->id}}" type="hidden">
                    <label for="contenu"></label>
                    <textarea name="contenu" id="contenu" rows="6" placeholder="Ecrivez un commentaire" required></textarea>
                    <input type="submit" value="Envoyer">
                </form>
                @endauth
            </div>

            {{--Nombre de lecture terminer--}}
            <div>
                <p>
                    total terminer : {{$terminer}}
                </p>
                <p>
                    Nombre d'avis positifs : {{$avis}}
                </p>
            </div>

            <!-- Commentaires ici-->
            @foreach($commentaires as $com)
                <div>
                    <p>Par {{$com->user->name}} :</p>
                    <p>{{$com->contenu}}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>