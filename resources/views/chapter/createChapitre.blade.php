<x-layout>
    <div>
        <h3>Liste des chapitres</h3>
        <table>
            <tr>
                <th>Id</th>
                <th>Titre court</th>
                <th>Question</th>
            </tr>
            @foreach($histoire->chapitres as $chapitre)
                <tr>
                    <td>{{$chapitre->id}}</td>
                    <td>{{$chapitre->titrecourt}}</td>
                    <td>{{$chapitre->question}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
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
    </div>
    <div>
        <h3>Liens des chapitres</h3>
        <table>
            <tr>
                <th>Source</th>
                <th>Réponse</th>
                <th>Destination</th>
            </tr>
            @foreach($histoire->chapitres as $chapitre)
                @foreach($chapitre->suivants as $suivant)
                <tr>
                    <td>{{$chapitre->id}}:{{$chapitre->titrecourt}}</td>
                    <td>{{$suivant->pivot->reponse}}</td>
                    <td>{{$suivant->id}}</td>
                </tr>
                @endforeach
            @endforeach
        </table>
    </div>
    <div>
        <form action="{{route('lienChapitre', ['id' => $histoire->id])}}" method="post">
            {!! csrf_field() !!}
            <div>
                <label>Source</label>
                <select name="id_src">
                    @foreach($histoire->chapitres as $chapitre)
                        <option value="{{$chapitre->id}}">{{$chapitre->id}}:{{$chapitre->titrecourt}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Destination</label>
                <select name="id_dest">
                    @foreach($histoire->chapitres as $chapitre)
                        <option value="{{$chapitre->id}}">{{$chapitre->id}}:{{$chapitre->titrecourt}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="text" name="reponse" placeholder="Reponse">
            </div>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</x-layout>