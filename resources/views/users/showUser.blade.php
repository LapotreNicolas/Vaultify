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
        @foreach($creees as $histoire)
            <ul>
                <a href="{{route("story.show",$histoire->id)}}">
                    <li>{{$histoire->titre}}</li>
                </a>
                <li>{{$histoire->pitch}}</li>
                <li><img src="{{asset($histoire->photo)}}" alt="photo"></li>
                <li></li>
            </ul>
        @endforeach
    </div>
</x-layout>