<?PHP
if (!$_SESSION) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <main>
        <?php require 'view/header.php'; ?>
        <h1>Login</h1>
        <?PHP
        if (isset($message)) {
            echo "<p class='notice'>$message</p>";
        }
        ?>

        <fieldset>
            <form action="." method="post">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email"><br>
                <label for="pass">Password: </label>
                <input type="password" name="password" id="pass"><br>
                <label>&nbsp;</label>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Submit" class="submit">
            </form>
        </fieldset>
        </main>
    </body>
</html>
