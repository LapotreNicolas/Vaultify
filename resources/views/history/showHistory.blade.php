<x-layout titre="Affiche une histoire">
    <div>
        <div>{{$histoire->titre}}</div>
        <div>{{$histoire->pitch}}</div>
{{--        <div>--}}
{{--            <img class="image" src="{{url('storage/'.$histoire->url_media)}}" alt="image tâche">--}}
{{--        </div>--}}
        <div>
            @if($action == 'delete')
                <form action="{{route('history.destroy',$histoire->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                        <button type="submit" name="delete" value="valide">Valide</button>
                        <button type="submit" name="delete" value="annule">Annule</button>
                    </div>
                </form>
            @else
                <div>
                    <a href="{{route('history.index')}}">Retour à la liste</a>
                </div>
            @endif
        </div>
    </div>
</x-layout>