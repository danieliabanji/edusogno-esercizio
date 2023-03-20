<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edusogno</title>
<!-- CSS -->
<link rel="stylesheet" href="assets/styles/style.css">
<!-- FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- SCRIPT -->
<script src="assets/js/script.js" defer></script> 
</head>

<body>
    <?php include ('partials/header.php'); ?>
    <h1>Hai già un account?</h1>

    <div class="register">
    <form action="login.php" class="account" method="post" id="login">
        <label for="email">Inserisci l'e-mail</label>
        <input type="email" id="email" placeholder="name@example" name="email" required/>
        
        <label for="email">Inserisci la password</label>
        <div class="togglePass">
            <input type="password" id="password" placeholder="Scrivila qui" name="password" required/>
            <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
        </div>

        <input type="submit" value="ACCEDI">
        <a class="log-register" href="newaccount.php">Non hai ancora un profilo? <strong>Registrati</strong></a>
    </form>

    </div>
</body>

</html>