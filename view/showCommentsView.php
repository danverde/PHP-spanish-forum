<?php
echo '<h2>Comments</h2>';
if (isset($comments)) {
    foreach ($comments as $comment):
        if (!empty($comment[3])) {
            echo "<div class='comment' id ='$comment[0]'>
                    <p>$comment[1]:</p>
                    <p>$comment[3]</p>";
            if ($_SESSION['username'] == $comment['username']) {
                echo "<form method='post' action='.' class='edit'>
                        <input type='hidden' value='editForm' name='action'>
                        <input type='hidden' value='$comment[0]' name='commentID'>
                        <label>&nbsp;</label>
                        <input type='submit' value='Edit' class='submit'> 
                        </form>
                        <form method='post' action='/dynamic_project/index.php' class='delete'>
                        <input type='hidden' value='deleteComment' name='action'> 
                        <input type='hidden' value='$comment[0]' name='commentID'>
                        <label>&nbsp;</label>
                        <input type='submit' value='Delete' class='submit'> 
                        </form>";
            }
        }
        echo "</div><br>";
    endforeach;

    echo "<fieldset>
        <legend>Post a Comment</legend>
            <form method='post' action='/dynamic_project/index.php'>
                <textarea id='comment' name='comment' placeholder='Enter a comment or question'></textarea><br>
                <input type='hidden' name='topic' value='$topic'>
                <input type='hidden' name='action' value='addComment'>
                <input type='submit' value='Post Comment' class='submit'>
            </form>
        </fieldset>";
}
