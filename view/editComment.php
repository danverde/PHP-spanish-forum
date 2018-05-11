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
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Comment</title>
    </head>
    <body>
        <main>
        <?php require 'header.php'; ?>
        <fieldset>
            <legend>Edit Comment</legend>
            <form action="." method="POST">
                <label for="comment_input">Edit Comment</label><br>
                <textarea name="newComment" id="comment_input"><?PHP if(isset($comment)){echo $comment['comment'];} ?></textarea><br>
                <input type="hidden" name="action" value="editComment">
                <input type="hidden" name="commentID" value="<?PHP if(isset($comment)){echo $commentID;} ?>">
                <input type="submit" value="Make Change" class="submit">   
            </form>
        </fieldset>
        </main>
    </body>
</html>
