<nav class="primary-menu">

    <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('articles.index')}}">Articoli</a></li>

        @if (!auth()->check())

            <li><a href="/login">Accedi</a></li>
            <li><a href="/register">Registrati</a></li>

        @else
        
            <li><a href="{{route('articles.create')}}">Nuovo articolo</a></li>
            <li><a href="{{route('users.articles')}}">I miei articoli</a></li>
            <li><a href="{{route('users.profile')}}">Profilo utente</a></li>
            <li>

                <form action="/logout" method="post">
                
                    @csrf

                    <input type="submit" value="Esci">

                </form>

            </li>

        @endif
    </ul>

</nav>