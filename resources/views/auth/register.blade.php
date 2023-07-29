<x-layout>

    <h1>Crea un account</h1>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif

    <!-- INCLUDO IL FORM DI REGISTRAZIONE PER FORTIFY -->

    <form action="/register" method="post">

        @csrf

        <input type="text" name="name" placeholder="Nome" value="{{old('name')}}">

        <input type="email" placeholder="Email" name="email" value="{{old('email')}}">

        <input type="password" placeholder="Password" name="password">

        <input type="password" placeholder="Conferma password" name="password_confirmation">

        <input type="submit" value="Registrati">

    </form>

</x-layout>