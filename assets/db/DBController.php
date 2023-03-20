<?php
include_once __DIR__ . '/../../helpers/conn_helper.php';

class DB
{
    static public function getConn()
    {
        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

        if ($conn && $conn->connect_error) {
            echo ('errore di connesione al server');
        } else {
            return $conn;
        }
    }

    // funzione per lanciare la migrazione
    static public function Migrate($path, $feedback = false)
    {

        //Controllo che la migrazione non è stata già lanciata
        $conn = DB::getConn();
        $sql = "SELECT * FROM `eventi`";
        $result = $conn->query($sql);
        if ($result) {
            //migrazione già lanciata
            // echo ('Già Migrato'); 
        } else {
            //migrazione da lanciare
            // echo ('Prima Migrazione');
            $query = '';
            $sqlScript = file($path); //il file lo salva come un array di righe
            $i = 1;

            foreach ($sqlScript as $line) {
              
                // memorizza i primi caratteri
                $start_line = substr(trim($line), 0, 2);
              
                // memorizza l ultimo carattere
                $end_line = substr(trim($line), -1, 1);

                // controlla la riga, se ha caratteri diversi dai commenti ecc ecc
                if (empty($line) || $start_line == '--' || $start_line == '/*' || $start_line == '//')
                    continue;

                // aggiunge la riga
                $query .= $line;

                // controlla ultimo carattere per eseguire la query
                if ($end_line == ';') {

                    // essegue la query o blocca il codice con un messagio di errore
                    $conn->query($query) or die('<div style="color: red;"><strong>Errore:</strong> Problema in execuzione della SQL query: <br>' . $query . '</div>');

                    // svuota la query
                    $query = '';

                    // se feedback è TRUE allora stampa a video un messaggio
                    if ($feedback) echo '<div style="color: green;">Migrazione <strong>Success ' . $i++ . '</strong></div>';
                }
            }
        }
        // chiusura del DB
        $conn->close();
    }
}