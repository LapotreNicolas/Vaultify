<x-layout titre="Profil">
    <h2>Bienvenue, {{Auth::user()->name}}</h2>
    <div>{{Auth::user()->email}}</div>
    <div> <img src="{{asset('storage/images/'.Auth::user()->avatar)}}" alt="avatar"> </div>

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
            <form action="{{route('users.upload')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="doc">avatar : </label>
                    <input type="file" name="document" id="doc">
                </div>
                <input type="submit" value="Télécharger" name="submit">
            </form>
    </ul>
</x-layout>