<x-layout>

    <h1>I miei articoli</h1>

    @foreach ($user_articles as $user_article)

        <h2>{{$user_article->title}}</h2>

        <p>{{$user_article->content}}</p>

        <p class="small"><a href="/articoli/modifica/{{$user_article->id}}">Modifica</a></p>
        
    @endforeach

</x-layout>