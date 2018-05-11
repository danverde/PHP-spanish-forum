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
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <title>Subject Pronouns</title>
    </head>
    <body>
        <main>
            <?PHP include 'header.php'; ?>
            <h1>Subject Pronouns</h1>
            <?PHP include 'nav.php'; ?>
            <br>
            <h2>Explanation</h2>
            <p>Subject pronouns are one of the most basic elements of a sentence. 
                Each sentence contains a subject, or a noun whom the sentence is about, 
                that performs the action, or that is being described. In many instances 
                the subject is replaced with a subject pronoun.</p>
            <p><strong>Here are the subject pronouns in Spanish:</strong></p>
            <table>
                <thead>
                    <tr>
                        <th>Singular</th>
                        <th>Plural</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Yo (I)</td>
                        <td>Nosotros (We)</td>
                    </tr>
                    <tr>
                        <td>Tú (You)</td>
                        <td>Vosotros (You)</td>
                    </tr>
                    <tr>
                        <td>Ústed (You - Formal)<br>
                            Él (He)<br>
                            Ella (She)</td>
                        <td>Ústedes (You - Plural Formal)<br>
                            Ellos (They)</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <ul>
                <li>Tú and Ústed both mean you, however they are both used in 
                    very different contexts. Tú is used when talking to close family
                    and Friends. Ústed is a sign of respect and is commonly used for 
                    those of a higher age or rank.</li>
                <li>In Spanish the feminine forms of Nosotros, Vosotros, & Ellos 
                    is only used when every member of the group is female. </li>
                <li>In the majority of the Spanish-speaking world, Ústedes is 
                    almost always used to say you when talking to a group.</li>                
            </ul>
            <br>
            <h2>Examples:</h2>
            <table>
                <tbody>
                    <tr>
                        <td>I am very Tall</td>
                        <td>Yo soy múy alto</td>
                    </tr>
                    <tr>
                        <td>You are very Tall</td>
                        <td>Tú eres  múy alto</td>
                    </tr>
                    <tr>
                        <td>She is very Tall</td>
                        <td>Ella es múy alta</td>
                    </tr>
                    <tr>
                        <td>We are very short</td>
                        <td>Nosotros somos múy cortos</td>
                    </tr>
                    <tr>
                        <td>They are very short</td>
                        <td>Ellos son múy cortos</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h2>Questions:</h2>
            <p>What Spanish pronoun would you use in the following situations?</p>
            <ol>
                <li>A sibling talking to their younger brother.</li>
                <li>You talking about the mailman.</li>
                <li>A student talking to their college professor.</li>
            </ol>

            <?PHP
            include 'showCommentsView.php';
            ?>
        </main>
    </body>
</html>