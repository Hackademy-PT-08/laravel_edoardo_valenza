<x-layout>

    <h1>Il mio profilo</h1>

    <!-- OUTPUT ERRORI VALIDAZIONE FORM -->

    @if ($errors->any())

        @foreach ($errors->all() as $error)
        
            <p style="color: red;">{{$error}}</p>

        @endforeach
        
    @endif

    <!-- FORM DI AGGIORNAMENTO PROFILO -->

    <form action="/user/profile-information" method="post">

        @method('PUT')
    
        @csrf

        <input type="text" name="name" placeholder="Nome" value="{{auth()->user()->name}}">

        <input type="email" placeholder="Email" name="email" value="{{auth()->user()->email}}">

        <input type="submit" value="Aggiorna">

    </form>

    <br>

    <form action="/user/password" method="post">

        @method('PUT')
    
        @csrf

        <input type="password" name="current_password" placeholder="Password attuale">

        <input type="password" placeholder="Password" name="password">

        <input type="password" placeholder="Conferma password" name="password_confirmation">

        <input type="submit" value="Aggiorna password">

    </form>

</x-layout>