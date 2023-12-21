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
        }
    </style>
    <div class="titreChap">
        <h1>{{ $chapter->titrecourt }}</h1>
        <img src="{{asset("images/ornament1.svg")}}" alt="">
    </div>
    <div class="chapitre" id="chapitre">
        @if (isset($chapter->media))
            <img src="{{$chapter->media}}" alt="Une image censé illustrer le chapitre">
        @endif
        <p>{!!$parsedown->text($chapter->texte)!!}</p>
        @if (count($suivants)>0)
            <div class="card questions">
                <h3>Questions</h3>
                <ul>
                    @foreach ($suivants as $suivant)
                        <li>
                            <p><a href="{{route('story.showChapter',['chapter_id' => $suivant->id, 'ariane' => $ariane] )}}">{{$suivant->pivot->reponse}}</a></p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <p class="ariane">@foreach($ariane as $key => $value)<a href="{{route('story.showChapter',['chapter_id' => $key, 'ariane' => $ariane])}}">{{$value}}</a>->@endforeach</p>
        @else
            <h3>Fin de Partie</h3>
        @endif
    </div>
</x-layout>