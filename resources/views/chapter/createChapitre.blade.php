<x-layout>
    <form action="{{route('storeChapitre', ['id' => $histoire->id])}}" method="post">
        {!! csrf_field() !!}
        <div>
            <input type="text" name="titre" placeholder="Titre">
        </div>
        <div>
            <input type="text" name="titrecourt" placeholder="Titre Court">
        </div>
        <div>
            <input type="text" name="media" placeholder="URL media">
        </div>
        <div>
            <input type="text" name="question" placeholder="Question">
        </div>
        <div>
            <input type="checkbox" name="premier">
        </div>
        <div>
            <textarea name="texte" rows="6" placeholder="Texte du chapitre" required></textarea>
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>

    <form action="{{route('lienChapitre', ['id' => $histoire->id])}}" method="post">
        {!! csrf_field() !!}
        <div>
            <label>Source</label>
            <input type="number" name="id_src">
        </div>
        <div>
            <label>Destination</label>
            <input type="number" name="id_dest">
        </div>
        <div>
            <input type="text" name="reponse" placeholder="Reponse">
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>
</x-layout>