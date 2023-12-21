@php
    $parsedown = new Parsedown();
@endphp
<x-layout titre="{{ $chapter->titrecourt }}">
    {{-- <div class="topImg">
        <img src="{{asset("images/topImg.jpg")}}" alt="topImg">
        <div>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
            <h1>{{ $chapter->titrecourt }}</h1>
            <img src="{{asset("images/ornament2.svg")}}" alt="">
        </div>
    </div> --}}
    <style>
        main {
            padding-top: 9rem;
            background-color: #282828;
        }
    </style>
    <div class="titreChap">
        <h1>{{ $chapter->titrecourt }}</h1>
        <img src="{{asset("images/ornament1.svg")}}" alt="">
    </div>
    <div class="chapitre" id="chapitre">
        <p>{!!$parsedown->text($chapter->texte)!!}</p>
        @if (isset($chapter->media))
            {{--<img src="{{ Storage::url($chapter->media) }}" alt="Une image censé illustrer le chapitre">--}}
        @endif
        @if (count($suivants)>0)
            <h3>Questions</h3>
            @foreach ($suivants as $suivant)
                <div class="question">
                    <p><a href="{{route('story.showChapter',['chapter_id' => $suivant->id, 'ariane' => $ariane] )}}">{{$suivant->pivot->reponse}}</a></p>
                </div>
            @endforeach
            <p>@foreach($ariane as $key => $value)<a href="{{route('story.showChapter',['chapter_id' => $key, 'ariane' => $ariane])}}">{{$value}}</a>->@endforeach</p>
        @else
            <h3>Fin de Partie</h3>
        @endif
    </div>
</x-layout>