<x-layout titre="Profil">
    <h2>Bienvenue, {{Auth::user()->name}}</h2>
    <div>{{Auth::user()->email}}</div>

    <ul>
        @foreach($histoires as $his)
                <li>
                    <div>
                        <a href="{{route('story.show', $his->id)}}">
                            <p>{{$his->titre}}</p>
                        </a>
                        <p>{{$his->pitch}}</p>
                        @if($his->active)
                            <p>active</p>
                        <form action="{{ route('story.changeActive') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$his->id}}">
                            <input type="submit" value="Désactiver">
                        </form>
                        @else
                            <p>inactive</p>
                            <form action="{{ route('story.changeActive') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$his->id}}">
                                <input type="submit" value="Activer">
                            </form>
                        @endif
                    </div>
                </li>
        @endforeach
    </ul>
</x-layout>