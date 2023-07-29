<x-layout>

    <p>Un link di verifica è stato inviato alla tua email</p>

    <form action="/email/verification-notification" method="post">
    
        @csrf

        <input type="submit" value="Invia di nuovo l'email di verifica">

    </form>

</x-layout>