<x-layout>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @error('titolo') Test errore titolo @enderror

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif
    
    <!-- FORM CREAZIONE TAG -->

    <h1>Aggiungi nuovo tag</h1>

    <form action="{{route('tags.store')}}" method="post">

        @csrf

        <label for="nome">Nome *</label>

        <input type="text" name="nome" id="nome" placeholder="Nome del tag" value="{{old('nome')}}" required>

        <p class="small">I campi contrassegnati con * sono obbligatori</p>

        <input type="submit" value="Aggiungi">

    </form>

</x-layout>