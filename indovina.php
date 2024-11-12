

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato del gioco</title>
</head>
<body>
    <?php

        session_start();

        // se non esistono, inizializza i contatori
        if (!isset($_SESSION['tentativi'])) {
            $_SESSION['tentativi'] = 0;
            $_SESSION['indovinati'] = 0;
        }

        $numeroCasuale = rand(1, 20);

        // controlla se è stato inviato un numero tramite GET
        if (isset($_GET['numero'])) {
            $numeroUtente = (int)$_GET['numero'];
            $_SESSION['tentativi']++;

            // verifica se il numero scelto dall'utente è corretto
            if ($numeroUtente === $numeroCasuale) {
                $_SESSION['indovinati']++;
                $risultato = "Congratulazioni! Hai indovinato!";
            } else {
                $risultato = "Sfortunatamente, non hai indovinato.";
            }
        } else {
            $risultato = "Non è stato inviato alcun numero.";
        }

    ?>
    <h1>Risultato del gioco</h1>

    <p>Numero casuale generato: <?php echo $numeroCasuale; ?></p>
    <p>Numero scelto dall'utente: <?php echo isset($numeroUtente) ? $numeroUtente : 'Nessun numero scelto'; ?></p>

    <p><?php echo $risultato; ?></p>

    <p>Hai giocato <?php echo $_SESSION['tentativi']; ?> volte, e hai indovinato <?php echo $_SESSION['indovinati']; ?> volte.</p>

    <a href="scelta.html">Prova di nuovo</a>
</body>
</html>
