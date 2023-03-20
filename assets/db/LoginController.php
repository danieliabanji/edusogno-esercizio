<?php 
        
        require_once('DBController.php');

        $conn = DB::getConn();

            $email = $conn->real_escape_string ($_POST['email']);
            $password = $conn->real_escape_string ($_POST['password']);

            if($_SERVER ["REQUEST_METHOD"] === "POST"){

                $sql = "SELECT * FROM utenti WHERE email = '$email'";
                if($result = $conn->query($sql)){
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        if(password_verify($password,$row['password'])){
                            session_start();

                            $_SESSION['loggato'] = true;
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['nome'] = $row['nome'];
                            $_SESSION['email'] = $row['email'];

                            header("location: ../../index.php");
                        }else{
                            echo '<p style="background-color:red; padding:5px">La password inserita non è corretta.</p>';
                            header('Refresh:4; URL=../../index.php');
                        }
                    }else{
                        echo '<p style="background-color:red; padding:5px">L\'email inserita non risulta registrata.</p>';
                        header('Refresh:4; URL=../../index.php');
                    }
                }else{
                    echo '<p style="background-color:red; padding:5px">Errore, riprova</p>';
                    echo '<a href="logout.php">Torna alla pagina di Login.</a>';
                }

                $conn->close();
            };