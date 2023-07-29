<x-layout>

    <h1>Accedi al tuo profilo</h1>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @error('titolo') Test errore titolo @enderror

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif

    <!-- INCLUDO IL FORM DI LOGIN PER FORTIFY -->

    <form action="/login" method="post">

        @csrf

        <input type="email" placeholder="Email" name="email" value="{{old('email')}}">

        <input type="password" placeholder="Password" name="password">

        <input type="submit" value="Accedi">

    </form>

</x-layout>