<?php
include_once __DIR__ . '/DBController.php';
include_once __DIR__ . '/Migration.php';

class User
{
    function __construct($id, $attendees, $nome_evento, $data_evento)
    {
        $this->id = $id;
        $this->attendees = $attendees;
        $this->nome_evento = $nome_evento;
        $this->data_evento = $data_evento;
    }


    static public function all()
    {
        $conn = DB::getConn();
        $sql = "SELECT * FROM `eventi`";
        $result = $conn->query($sql);
        $conn->close();
        $res = User::resultToArray($result);
        return $res;
    }

    //funzione per trasformare il risultato in array
    static public function resultToArray($result)
    {
        if ($result && $result->num_rows > 0) {
            $items = [];

            while ($row = $result->fetch_assoc()) {
                $el = new User(
                    $row['id'],
                    $row['attendees'],
                    $row['nome_evento'],
                    $row['data_evento'],
                );

                $items[] = [
                    'nome_evento' => $el->nome_evento,
                'data_evento' => $el->data_evento,
                ];
            }

            return $items;
        } else {
            return [];
        }
    }


    
}