<x-layout>
    
    <h1>Tutti gli articoli</h1>

    <br>

    <!-- FOREACH DI TUTTI GLI ARTICOLI -->

    @foreach ($articles as $article)
    
        <h2>{{$article->title}}</h2>

        <p>{{$article->content}}</p>

        <br>

    @endforeach

</x-layout>