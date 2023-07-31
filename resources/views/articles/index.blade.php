<x-layout>

    <!-- OUTPUT DI TUTTI GLI ARTICOLI TRAMITE FOREACH -->

    @foreach ($articles as $article)

        <h2>{{$article->title}}</h2>

        <p>{{$article->content}}</p>

        <p class="small"><a href="/articoli/modifica/{{$article->id}}">Modifica</a></p>
        
    @endforeach

</x-layout>