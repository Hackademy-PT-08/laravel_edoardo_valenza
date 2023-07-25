<!-- FORM CREAZIONE ARTICOLO -->

<h1>Aggiungi nuovo articolo</h1>

<form action="/articoli/aggiungi" method="post">

    @csrf

    <input type="text" name="titolo" placeholder="Titolo dell'articolo">

    <textarea name="contenuto" cols="30" rows="10" placeholder="Testo dell'articolo"></textarea>

    <input type="submit" value="Aggiungi">

    <a href="/">Annulla</a>

</form>