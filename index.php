<?php
session_start();

if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('partials/meta.php'); ?>
</head>

<body>
    <?php include ('partials/header.php'); 
    
    include_once __DIR__ . '/assets/db/UserController.php';

    $result = User::all();
    $events = User::resultToArray($result);
    echo '<div class="private">';
    echo  "<h1>Ciao " . $_SESSION['nome'] . " ecco i tuoi eventi.</h1>";
     ?>

<?php
echo '<div class="events">';
$events = $result;

if (count($events) > 0) {
    foreach ($events as $event) {
        echo '<div class="event">';
        echo '<h2>'.$event['nome_evento'].'</h2>';
        echo '<span class="date">'.$event['data_evento'].'</span>';
        echo '<button type="button">JOIN</button>';
        echo '</div>';
    }
} else {
    echo '<h3>Non ci sono eventi</h3>';
}
echo '</div>';
echo '<div class="log-out">';
        echo '<a class="log-register logout" href="logout.php">Disconnetti</a>';
                echo '</div>';
                echo '</div>';
?>
</body>

</html>