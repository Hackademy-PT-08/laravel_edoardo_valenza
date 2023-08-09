<x-layout>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @error('titolo') Test errore titolo @enderror

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif
    
    <!-- FORM MODIFICA TAG -->

    <h1>Modifica tag</h1>

    <form action="{{route('tags.update', $tag->id)}}" method="post">

        @csrf

        @method('PUT')

        <label for="nome">Nome *</label>

        <input type="text" name="nome" id="nome" placeholder="Nome del tag" value="{{$tag->name}}" required>

        <p class="small">I campi contrassegnati con * sono obbligatori</p>

        <input type="submit" value="Modifica">

    </form>

</x-layout>