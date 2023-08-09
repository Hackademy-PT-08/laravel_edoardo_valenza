<x-layout>

    <p><a href="{{route('tags.create')}}">Aggiungi nuovo tag</a></p>

    <!-- OUTPUT DI TUTTI GLI ARTICOLI TRAMITE FOREACH -->

    @foreach ($articles as $article)

        <h2>{{$article->title}}</h2>

        <p>{{$article->content}}</p>

        <p>Autore: {{$article->user->name}}</p>
        
        <p>
            
            Tag:
        
            @foreach ($article->tags as $tag)
            
                <a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a>,

            @endforeach
        
        </p>

        <p class="small"><a href="/articoli/modifica/{{$article->id}}">Modifica</a></p>
        
    @endforeach

</x-layout>