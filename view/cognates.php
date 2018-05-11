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
        <title>Cognates</title>
    </head>
    <body>
        <main>
            <?PHP include 'header.php'; ?>
            <h1>Cognates</h1>
            <?PHP include 'nav.php'; ?>
            <br>


            <h2>Explanation</h2>
            <p>A cognate is a word that is related to another word in a different
                language. They look alike & usually have the same meaning. For example:</p>
            <table>
                <thead>
                    <tr>
                        <th>English</th>
                        <th>-></th>
                        <th>Spanish</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>possible</td>
                        <td>-></td>
                        <td>posible</td>
                    </tr>
                    <tr>
                        <td>activate</td>
                        <td>-></td>
                        <td>activar</td>
                    </tr>
                    <tr>
                        <td>obtain</td>
                        <td>-></td>
                        <td>obtener</td>
                    </tr>
                    <tr>
                        <td>climate</td>
                        <td>-></td>
                        <td>clima</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>The following are patterns between English & Spanish cognates:</strong></p>
            <h3>Verbs</h3>
            <table>
                <thead>
                    <tr>
                        <th>-ate</th>
                        <th>-ar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>communicate</td>
                        <td>comunicar</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>-pose</th>
                        <th>-poner</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>expose</td>
                        <td>exponer</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>-tract</th>
                        <th>-traer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>attract</td>
                        <td>atraer</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>-tain</th>
                        <th>-tener</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>contain</td>
                        <td>contener</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3>Nouns</h3>
            <table>
                <thead>
                    <tr>
                        <th>-ist</th>
                        <th>-ista</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>artist</td>
                        <td>artista</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>-ty</th>
                        <th>-dad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>humility</td>
                        <td>humilidad</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>There are also False cognates - words that appear to be related but are not</strong></p>
            <table>
                <thead>
                    <tr>
                        <th>False Cognate</th>
                        <th>Translation</th>
                        <th>Often mistaken for:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>embarazada</td>
                        <td>pregnant</td>
                        <td>embarrassed (avergonzado)</td>
                    </tr>
                    <tr>
                        <td>éxito</td>
                        <td>success</td>
                        <td>exit (salida)</td>
                    </tr>
                    <tr>
                        <td>actualmente</td>
                        <td>at the present time</td>
                        <td>actually (en realidad)</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <?PHP
            include 'showCommentsView.php';
            ?>
        </main>
    </body>
</html>