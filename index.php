<?php

if (!$_SESSION) {
    session_start();
}

require_once 'model/db_spa.php';
require_once 'model/comments.php';
require_once 'model/students.php';

if ($username == 'anielgr2_iClient'){
    $username = '';
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if (empty($action)) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

$message = '';

switch ($action) {
    case 'register':
        $fName = filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_STRING);
        $lName = filter_input(INPUT_POST, 'lName', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);

        //compare username
        if (strlen($username) < 5) {
            $message .='<br>The username must be more than 5 characters long.';
        }

        //compare passwords
        if ($pass !== $pass2) {
            $message.='<br>The passwords are not the same.';
        }

        //compare password length to be at least 8 characters
        if (strlen($pass) < 8) {
            $message .='<br>The password must be at least 8 characters.';
        }
        //ensure password contains one of these (*.!-_%$@)
        $symbols = ['*', '.', '!', ' ', '-', '_', '%', '$', '@'];
        $pwdarray = str_split($pass);
        $pwdflag = FALSE;
        foreach ($symbols as $value) {
            if (in_array($value, $pwdarray)) {
                $pwdflag = TRUE;
            }
        }
        if (!$pwdflag) {
            $message .= '<br>The password must have at least one of the special characters.';
        }

        if (!empty($message)) {
            include'view/reg.php';
            exit;
        }

        //handle the password hash - PHP 5.5 or later only
        $hpass = password_hash($pass, PASSWORD_DEFAULT);

        // make sure the email is not a duplicate
        $validEmail = validateEmail($email);
        if ($validEmail) {
            $message .= "<br>We're sorry, that is not a valid email.";
            include 'view/reg.php';
            exit;
        }

        // make sure username is not a duplicate
        $validUsername = validateUsername($username);
        if ($validUsername) {
            $message .= "<br>We're sorry, that username has been taken.";
            include 'view/reg.php';
            exit;
        }

        //send to database
        $regResult = regClient($fName, $lName, $username, $email, $hpass);
        if ($regResult) {
            $message = "Thanks $fName, please login.";
            include 'view/login.php';
            exit;
        } else {
            $message = "Sorry $fName, there was an error. Please try again.";
            include 'view/reg.php';
        }
        break;
    case 'login':
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $foundEmail = validateEmail($email);
        if (!empty($foundEmail)) {
            $clientInfo = getClientInfo($email);

            if (password_verify($password, $clientInfo['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['firstname'] = $clientInfo['firstname'];
                $_SESSION['studentID'] = $clientInfo['studentID'];
                $_SESSION['username'] = $clientInfo['username'];

                include "view/student.php";
            }
        } else {
            $message = "Your email or password was incorrect. Please try again.";
            include 'view/login.php';
        }
        break;
    case 'logout':
        setcookie(session_name(), "", 1, '/');
        session_destroy();
        header('location: .');
        break;
    case 'signin':
        include 'view/login.php';
        break;
    case 'reg':
        include 'view/reg.php';
        break;
    case 'addComment':
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $topic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING);
        $fName = $_SESSION['firstname'];
        $username = $_SESSION['username'];

        if (empty($comment) || empty($topic)) {
            $message = "Sorry $fName, there was an error. Please try again.";
            include "view/student.php";
            exit;
        }

        $add = addComment($username, $topic, $comment);

        if ($add) {
            $message = "$fName, your comment was successfully added";
            include "view/student.php";
            exit;
        } else {
            $message = "Sorry $fName, there was an error. Please try again.";
            include "view/student.php";
        }

        break;
    case 'editForm':
        $commentID = filter_input(INPUT_POST, 'commentID', FILTER_SANITIZE_STRING);
        $comment = getCommentByID($commentID);

        include 'view/editComment.php';
        exit;
        break;
    case 'editComment':
        $fname = $_SESSION['firstname'];
        $commentID = filter_input(INPUT_POST, 'commentID', FILTER_VALIDATE_INT);
        $newComment = filter_input(INPUT_POST, 'newComment', FILTER_SANITIZE_STRING);

        // ensures the new comment isn't blank
        if (empty($newComment)) {
            $message = "Sorry, $fname, Something went wrong.";
            include 'view/student.php';
            exit;
        }

        $edited = editComment($commentID, $newComment);

        if ($edited == NULL) {
            $message = "Sorry, $fname, There was an error.";
            include 'view/student.php';
            exit;
        } else {
            $message = "Your post has been successfully edited.";
            include 'view/student.php';
            exit;
        }
        break;
    case 'deleteComment':
        $commentID = filter_input(INPUT_POST, 'commentID', FILTER_SANITIZE_STRING);

        $deleted = deleteComment($commentID);
        if (!isset($deleted)) {
            $message = "Your post has been successfully deleted.";
            include 'view/student.php';
            exit;
        } else {
            $message = "Sorry $fname, There was an error.";
            include 'view/student.php';
            exit;
        }

        break;
    case 'showComments':
        //get the topic
        $topic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING);

        if (empty($topic)) {
            $topic = filter_input(INPUT_GET, 'topic', FILTER_SANITIZE_STRING);
        }

        // get the comments
        $comments = getCommentsByTopic($topic);

        if (empty($comments)) {
            $comments = array();
        }
        include "view/$topic.php";
        break;

    default:
        include 'view/start.php';
        exit;
        break;
}