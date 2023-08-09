<x-layout>

    <h1>{{$tag_name}}</h1>

    <!-- OUTPUT DI TUTTI GLI ARTICOLI ASSEGNATI AL TAG SELEZIONATO TRAMITE FOREACH -->

    @foreach ($articles as $article)

        <h2>{{$article->title}}</h2>

        <p>{{$article->content}}</p>

        <p>Autore: {{$article->user->name}}</p>

        <p class="small"><a href="/articoli/modifica/{{$article->id}}">Modifica</a></p>
        
    @endforeach

</x-layout>