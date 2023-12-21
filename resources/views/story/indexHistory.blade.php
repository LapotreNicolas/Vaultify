<x-layout>
    <div class="topImg">
        <img src="{{asset("images/topImg.jpg")}}" alt="topImg">
        <div>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
            <h1>Toutes les histoires</h1>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
        </div>
    </div>
    <div class="bgBlack">
        <div class="container">
            @if(!empty($histoires))
                {{--LES COMMENTAIRES SONT POUR LE FILTRAGE MAIS C'EST PAS LE BON--}}
                <h4>Filtrage par genre</h4>
                <form action="{{route('story.index')}}" method="get" class="filtre">
                    <select name="nom_genre">
                        <option value="All" @if($genre == 'All') selected @endif>-- Tout genre --</option>
                        @foreach($genres_possibles as $gp)
                            <option value="{{$gp}}" @if($genre == $gp) selected @endif>{{$gp}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="OK" class="test">
                </form>
                <div>
                    <div class="cards">
                    @foreach($histoires as $histoire)
                        @if ($histoire->active>0)
    
                            <div class="card">
                                <div class="titleCard">
                                    <img src="{{asset('storage/images/'.$histoire->user->avatar)}}" alt="avatar">
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
                            @endif
                            @endforeach
                        </div>
                </div>
            @else
                <h3>Là, il n'y a pas d'histoire</h3>
            @endif
        </div>
    </div>
</x-layout>
