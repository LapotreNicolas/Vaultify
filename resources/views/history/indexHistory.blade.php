<x-layout>
    <div>
        <div>
            <h1>Titre</h1>
        </div>
        @if(!empty($histoires))
            {{--LES COMMENTAIRES SONT POUR LE FILTRAGE MAIS C'EST PAS LE BON--}}
            <h4>Filtrage par genre</h4>
            <form action="{{route('history.index')}}" method="get">
                <select name="cat">
                    <option value="All" @if($cat == 'All') selected @endif>-- Tout genre --</option>
                    @foreach($genreFiltres as $genreFiltre)
                        <option value="{{$genreFiltre}}" @if($cat == $genreFiltre) selected @endif>{{$genreFiltre}}</option>
                    @endforeach
                </select>
                <input type="submit" value="OK">
            </form>
            <div>
                @foreach($histoires as $histoire)
                    <div>{{$histoire->titre}}</div>
                    <div>{{$histoire->pitch}}</div>
                    <div>
                        <button>
                            <a href="{{route('history.show', [$histoire->id, 'action' => 'show'])}}">AFFICHER</a>
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <h3>Là y a pas d'histoire</h3>
        @endif
    </div>
</x-layout>
