<x-layout titre="Utilisateur">
    <div>
        <ul>
            <li>{{$user->name}}</li>
            <li>{{$user->email}}</li>
            <li>{{count($finies)}}</li>
        </ul>
        @foreach($creees as $histoire)
            <ul>
                <a href="{{route("story.show",$histoire->id)}}">
                    <li>{{$histoire->titre}}</li>
                </a>
                <li>{{$histoire->pitch}}</li>
                <li><img src="{{Storage::url($histoire->photo)}}"></li>
                <li></li>
            </ul>
        @endforeach
    </div>
</x-layout>