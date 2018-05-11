<?PHP 
if(!$_SESSION){
session_start();
}
if (!$_SESSION['loggedin']){
    header('location: login.php');
    $_SESSION['badUser'] = "Sorry, not allowed.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Page</title>
    </head>
    <body>
        <main>
        <?php require 'header.php'; ?>
        <!--<h1>Welcome Student!</h1>-->
        <h1>Welcome Student!</h1>
        
        <?PHP include 'nav.php';?>
        <br>
        <p>This is where you go to learn about all the different Spanish topics we have ready for you.<br>
        Select one of the options above to start learning</p>
        <?php
        if(isset($message) && !empty($message)){echo "<br><p class='notice'>$message</p><br>";}
        ?>
        </main>
    </body>
</html>
