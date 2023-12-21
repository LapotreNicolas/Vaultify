<x-layout titre="Profil">

    <style>
        main {
            padding: 12rem;
        }
    </style>

<div class="container">
    <div class="cards3">
        <div class="card3">
            <h2>Bienvenue, {{Auth::user()->name}}</h2>
            <h3>{{Auth::user()->email}}</h3>
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
                                    <p class="status">active</p>
                                <form action="{{ route('story.changeActive') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$his->id}}">
                                    <input type="submit" value="Désactiver" class="buttonStatus">
                                </form>
                                @else
                                    <p class="status">inactive</p>
                                    <form action="{{ route('story.changeActive') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$his->id}}">
                                        <input type="submit" value="Activer" class="buttonStatus">
                                    </form>
                                @endif
                            </div>
                        </li>
                @endforeach
                    <form action="{{route('users.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="avatar">
                            <label for="doc">avatar : </label>
                            <input type="file" name="document" id="doc">
                        </div>
                        <input type="submit" value="Télécharger" name="submit">
                    </form>
            </ul>
        </div>
    </div>
</div>
</x-layout>