<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('partials/meta.php'); ?>

</head>

<body>
    <?php 
    include_once __DIR__ . '/assets/db/UserController.php';
    ?>
    <main>
        <?php
        include ('partials/header.php');
        ?>
        <h1>Hai già un account?</h1>
        <div class="register">
        <form action="assets/db/LoginController.php" class="account" method="post" id="login">
            <label for="email">Inserisci l'e-mail</label>
            <input type="email" id="email" placeholder="name@example" name="email" required/>
        
            <label for="email">Inserisci la password</label>
            <div class="togglePass">
                <input type="password" id="password" placeholder="Scrivila qui" name="password" required/>
                <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <input type="submit" value="ACCEDI">
            <a class="log-register" href="register.php">Non hai ancora un profilo? <strong>Registrati</strong></a>
        </form>
        </div>
    </main>
</body>

</html>