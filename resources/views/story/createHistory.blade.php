{{--
messages d'erreurs dans la saisie du formulaire.
--}}
<x-layout>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('story.store')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div>
            <h3>Création d'une histoire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            <label for="titre"><strong>Titre de l'histoire : </strong></label>
            <input type="text" name="titre" id="titre"
                   value="{{ old('titre') }}">
        </div>
        <div>
            <label for="pitch-input"><strong>Pitch : </strong></label>
            <textarea name="pitch" id="pitch" rows="6"
                      placeholder="Pitch..">{{ old('pitch') }}</textarea>
        </div>
        <div>
            <label for="active"><strong>Active : </strong></label>
            <input type="number" min="0" max="1" id="active" name="active"
                   value="{{ old('active') }}">
        </div>
        <label for="genre_id"><strong>Genre:</strong></label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->label }}</option>
            @endforeach
        </select>

        </div>

        <div>
            <strong>Photo :</strong>
            <input type="file" name="photo" placeholder="image" {{ old('photo') }}>
        </div>
        <div>
            <button type="submit">Valide</button>
        </div>
    </form>
</x-layout>
