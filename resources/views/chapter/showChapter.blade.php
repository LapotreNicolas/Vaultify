@php
    $parsedown = new Parsedown();
@endphp
<x-layout titre="{{ $chapter->titrecourt }}">
    <div class="chapitre" id="chapitre">
        <h1>{{ $chapter->titrecourt }}</h1>
        <p>{!!$parsedown->text($chapter->texte)!!}</p>
        @if (isset($chapter->media))
            {{--<img src="{{ Storage::url($chapter->media) }}" alt="Une image censé illustrer le chapitre">--}}
        @endif
        @if (count($suivants)>0)
            <h3>Questions</h3>
            @foreach ($suivants as $suivant)
                <div class="question">
                    <p><a href="{{route('story.showChapter',['chapter_id' => $suivant->id] )}}">{{$suivant->pivot->reponse}}</a></p>
                </div>
            @endforeach
        @else
            <h3>Fin de Partie</h3>
        @endif
    </div>
</x-layout>