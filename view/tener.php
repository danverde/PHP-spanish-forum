<?PHP
if (!$_SESSION) {
    session_start();
}
if (!$_SESSION['loggedin']) {
    header('location: ../login.php');
    $_SESSION['badUser'] = "Sorry, not allowed.";
    exit;
}
if (isset($_SESSION['badUser'])) {
    $message = $_SESSION['badUser'];
    unset($_SESSION['badUser']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tener</title>
    </head>
    <body>
        <main>
            <?PHP include 'header.php'; ?>


            <h1>Common Expressions with Tener</h1>
            <?PHP include 'nav.php'; ?>
            <br>
            <h2>Explanation</h2>
            <p>In English it is very common to make a statement such as: I am 
                hungry. In Spanish this and many other common phrases that use 
                the verb To Be are said by using the verb Tener. Here is a list 
                of some common expressions that use the verb tener:</p>
            <table>
                <thead>
                    <tr>
                        <th>Expressions with Tener</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>tener... años</td>
                        <td>=</td>
                        <td>to be... years old</td>
                    </tr>
                    <tr>
                        <td>tener hambre/sed</td>
                        <td>=</td>
                        <td>to be hungry/thirsty</td>
                    </tr>
                    <tr>
                        <td>tener calor/frío</td>
                        <td>=</td>
                        <td>to be hot/cold</td>
                    </tr>
                    <tr>
                        <td>tener cuidado</td>
                        <td>=</td>
                        <td>to be careful</td>
                    </tr>
                    <tr>
                        <td>tener prisa</td>
                        <td>=</td>
                        <td>to be in a hurry</td>
                    </tr>
                    <tr>
                        <td>tener razón</td>
                        <td>=</td>
                        <td>to be right</td>
                    </tr>
                    <tr>
                        <td>tener la culpa</td>
                        <td>=</td>
                        <td>to be at fault</td>
                    </tr>
                    <tr>
                        <td>tener sueño</td>
                        <td>=</td>
                        <td>to be sleepy</td>
                    </tr>
                    <tr>
                        <td>tener suerte</td>
                        <td>=</td>
                        <td>to be lucky</td>
                    </tr>
                    <tr>
                        <td>tener miedo</td>
                        <td>=</td>
                        <td>to be afraid</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>You can also use tener que to mean I have to. For example:</strong></p>
            <p>"Tenemos que estudiar mucho." is equivalent to "We have to study a lot."</p>
            <br>
            <?PHP
            include 'showCommentsView.php';
            ?>
        </main>
    </body>
</html>