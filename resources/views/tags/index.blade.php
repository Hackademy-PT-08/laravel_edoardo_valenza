<x-layout>

    <!-- OUTPUT DI TUTTI I TAG TRAMITE FOREACH -->

    @foreach ($tags as $tag)

        <h2>{{$tag->name}}</h2>

        <p class="small"><a href="/tag/modifica/{{$tag->id}}">Modifica</a></p>
        
    @endforeach

</x-layout>