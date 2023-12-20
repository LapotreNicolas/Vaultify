<x-layout>
    <div>
        <div>
            <h1>Titre</h1>
        </div>
        @if(!empty($histoires))
            {{--LES COMMENTAIRES SONT POUR LE FILTRAGE MAIS C'EST PAS LE BON--}}
            <h4>Filtrage par genre</h4>
            <form action="{{route('story.index')}}" method="get">
                <select name="nom_genre">
                    <option value="All" @if($genre == 'All') selected @endif>-- Tout genre --</option>
                    @foreach($genres_possibles as $gp)
                        <option value="{{$gp}}" @if($genre == $gp) selected @endif>{{$gp}}</option>
                    @endforeach
                </select>
                <input type="submit" value="OK">
            </form>
            <div>
                @foreach($histoires as $histoire)
                    @if ($histoire->active>0)
                    <div>{{$histoire->titre}}</div>
                    <div>{{$histoire->pitch}}</div>
                    <a href="{{route('users.show',$histoire->user->id)}}">
                        <div>{{$histoire->user->name}}</div>
                    </a>
                    <div>
                        <button>
                            <a href="{{route('story.show', [$histoire->id, 'action' => 'show'])}}">AFFICHER</a>
                        </button>
                    </div>
                    @endif
                @endforeach
            </div>
        @else
            <h3>Là, il n'y a pas d'histoire</h3>
        @endif
    </div>
</x-layout>
