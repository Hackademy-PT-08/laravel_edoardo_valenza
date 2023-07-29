<x-layout>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @error('titolo') Test errore titolo @enderror

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif
    
    <!-- FORM CREAZIONE ARTICOLO -->

    <h1>Aggiungi nuovo articolo</h1>

    <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">

        @csrf

        <label for="titolo">Titolo *</label>

        <input type="text" name="titolo" id="titolo" placeholder="Titolo dell'articolo" value="{{old('titolo')}}" required>

        <label for="contenuto">Contenuto *</label>

        <textarea name="contenuto" id="contenuto" cols="30" rows="10" placeholder="Testo dell'articolo" required>{{old('contenuto')}}</textarea>

        <label for="immagine">Immagine</label>

        <input type="file" name="immagine" id="immagine">

        <p class="small">I campi contrassegnati con * sono obbligatori</p>

        <input type="submit" value="Aggiungi">

        <a href="/">Annulla</a>

    </form>

</x-layout>