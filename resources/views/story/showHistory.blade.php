<x-layout titre="Affiche une histoire">
    <div>
        <div>titre : {{$histoire->titre}}</div>
        <div>pitch : {{$histoire->pitch}}</div>
        <div>genre : {{$histoire->genre['label']}}</div>
        <div>
            <img class="image" src="{{url('storage/'.$histoire->photo)}}" alt="image">
        </div>
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
    </div>
</x-layout>