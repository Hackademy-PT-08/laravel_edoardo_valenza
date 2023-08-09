<x-layout>
    
    <h1>Tutti gli articoli</h1>

    <br>

    <!-- FOREACH DI TUTTI GLI ARTICOLI -->

    @foreach ($articles as $article)

        @if ($article->image !== '')
            <img src="{{asset('storage/' . $article->image)}}" alt="{{$article->title}}" class="img-responsive" style="max-width: 200px;">
        @endif
    
        <h2>{{$article->title}}</h2>

        <p>{{$article->content}}</p>

        <p>Autore: {{$article->user->name}}</p>

        <br>

    @endforeach

</x-layout>