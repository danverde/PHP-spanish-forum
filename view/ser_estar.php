<?PHP
if (!$_SESSION) {
    session_start();
}
if (!$_SESSION['loggedin']) {
    header('location: ../login.php');
    $_SESSION['badUser'] = "Sorry, not allowed.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ser &amp; Estar</title>
    </head>
    <body>
        <main>
            <?PHP include 'header.php'; ?>
            <h1>Ser &amp; Estar</h1>
            <?PHP include 'nav.php'; ?>
            <br>
            <h2>Explanation</h2>
            <p>Spanish, unlike English, has two different verbs that express a 
                state of being. Both the verbs Ser and Estar translate to the 
                English verb To Be, however these two words are not interchangeable
                in Spanish.</p>
            <table>
                <thead>
                    <tr>
                        <th>Ser</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>soy</td>
                        <td>somos</td>
                    </tr>
                    <tr>
                        <td>eres</td>
                        <td>sois</td>
                    </tr>
                    <tr>
                        <td>es</td>
                        <td>son</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Estar</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>estoy</td>
                        <td>estamos</td>
                    </tr>
                    <tr>
                        <td>estás</td>
                        <td>estáis</td>
                    </tr>
                    <tr>
                        <td>está</td>
                        <td>están</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><strong>Ser is used to express conditions that are not expected to change
                over time such as:</strong></p>
            <ul>
                <li>A nationality</li>
                <li>A relationship</li>
                <li>Origin or ownership</li>
                <li>Expression of dates and times</li>
                <li>The location of events</li>
            </ul>
            <p>Estar is used to express immediate perceptions – changeable states or conditions</p>
            <p><strong>Some adjectives have different meanings depending on which verb is used:</strong></p>
            <table>
                <thead>
                    <tr>
                        <th>Ser</th>
                        <th>Adjective</th>
                        <th>Estar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>boring</td>
                        <td>aburrido</td>
                        <td>bored</td>
                    </tr>
                    <tr>
                        <td>selfish</td>
                        <td>interesado</td>
                        <td>interested</td>
                    </tr>
                    <tr>
                        <td>tidy</td>
                        <td>limpio</td>
                        <td>clean</td>
                    </tr>
                    <tr>
                        <td>smart</td>
                        <td>listo</td>
                        <td>ready</td>
                    </tr>
                    <tr>
                        <td>evil</td>
                        <td>malo</td>
                        <td>sick</td>
                    </tr>
                    <tr>
                        <td>alert</td>
                        <td>vivo</td>
                        <td>alive</td>
                    </tr>
                </tbody>
            </table>
            <br>

            <?PHP
            include'showCommentsView.php';
            ?>
        </main>
    </body>
</html>