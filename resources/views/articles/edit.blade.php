<x-layout>

    <h1>Modifica l'articolo: {{$article->title}}</h1>

    <form action="/articoli/modifica/{{$article->id}}" method="post" enctype="multipart/form-data">
    
        @csrf

        @method('PUT')

        <input type="text" name="titolo" placeholder="Titolo" value="{{$article->title}}">

        <textarea name="contenuto" placeholder="Contenuto" cols="30" rows="10">{{$article->content}}</textarea>

        <input type="file" name="immagine">

        <input type="submit" value="Aggiorna">

    </form>

    <br>

    <form action="/articoli/elimina/{{$article->id}}" method="post">

        @csrf

        @method('DELETE')
    
        <input type="submit" value="Elimina">

    </form>

</x-layout>