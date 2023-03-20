<?php include('confing.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('partials/meta.php'); ?>
</head>

<body>
    <?php include ('partials/header.php'); ?>
    <h1>Crea il tuo account</h1>
        <div class="register">
            
        <form class="account" action="assets/db/RegisterController.php" method="post" id="account-register">
            <label for="firstName">Inserisci il nome</label>
            <input type="text" id="firstName" placeholder="Mario" name="firstName"/>

            <label for="lastName">Inserisci il cognome</label>
            <input type="text" id="lastName" placeholder="Rossi" name="lastName" />

            <label for="email">Inserisci l'email</label>
            <input type="email" id="email" placeholder="name@example.com" name="email" />

            <label for="password">Inserisci la password</label>
            <div class="togglePwd">
                <input type="password" id="password" placeholder="Scrivila qui" id="password" name="password" />
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <input type="submit" value="REGISTRATI" />
            <a class="log-register" href="login.php">Hai già un account? <strong>Accedi</strong></a>
        </form>

        </div>
        
    </body>
</html>