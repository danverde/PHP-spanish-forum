<?PHP 
if(!$_SESSION){
session_start();
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <main>
        <?php require 'view/header.php'; ?>
        <h1>Register</h1>
        
        <?PHP 
        if(isset($message)){
         echo "<p class='notice'>$message</p>";
        } else {?>
        <p>All fields are required.</p>
        <?php } ?>

        <fieldset>
            <legend>Register Here</legend>
            <form action="." method="post">
                <label for="fName">First Name: </label>
                <input type="text" <?PHP if(isset($fName)){echo "value='$fName'";}?>
                       name="fName" id="fName"><br>
                <label for="lName">Last Name: </label>
                <input type="text" <?PHP if(isset($lName)){echo "value='$lName'";}?>
                       name="lName" id="lName"><br>
                <label for="username">Username: </label>
                <input type="text" <?PHP if(isset($username)){echo "value='$username'";}?>
                       name="username" id="username"><br>
                <label for="email">Email Address: </label>
                <input type="text" <?PHP if(isset($email)){echo "value='$email'";}?>
                       name="email" id="email"><br>
                <label for="pass">Password: </label>
                <input type="password" name="pass" id="pass"  placeholder="Must contain at least one of *.! -_%$"><br>
                <label for="pass2">Please re-enter your Password: </label>
                <input type="password" name="pass2" id="pass2"><br>
                <input type="hidden" name="action" value="register">
                <label>&nbsp;</label>
                <input type="submit" value="Submit" class="submit">
            </form>  
        </fieldset>
        </main>
    </body>
</html>
