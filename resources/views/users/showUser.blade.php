<x-layout titre="Utilisateur">
    <div class="homeImg">
        <img src="{{asset("images/homeImg.jpg")}}" alt="homeImg">
        <div class="homeTextImg">
            <h1>{{$user->name}}</h1>
            <h2>{{$user->email}}</h2>
            <img src="../images/ornament1.svg" alt="ornament ">
            <h3>{{$user->name}} a fini de lire {{$finies}} histoire</h3>
        </div>
        {{-- <a href="#homeContent"><i class='bx bx-down-arrow-alt'></i></a> --}}
    </div>
    <div>
        {{-- <ul>
            <li>{{$user->name}}</li>
            <li>{{$user->email}}</li>
            <li>{{$finies}}</li>
        </ul> --}}
        <div class="cards3">
            @foreach($creees as $histoire)
            <div class="card3">
                <ul>
                    <a href="{{route("story.show",$histoire->id)}}">
                    <h2>{{$histoire->titre}}</h2>
                    </a>
                    <p style="max-width: 90%">{{$histoire->pitch}}</p>
                    <img src="{{asset($histoire->photo)}}" alt="photo">
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>