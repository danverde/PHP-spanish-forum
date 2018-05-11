
<link rel="stylesheet" type="text/css" href="/styles.css">
<?php
/* 
 * This sample header is for inclusion in the views, it is not stand alone
 */
$tools = '<nav><ul>';
if($_SESSION['loggedin']){
 $tools .= '<li><a href="/index.php?action=logout" title="Click to logout">Logout</a></li>';
 $tools .= '<li><a href="/view/student.php" title="Click to go to the Student page">Student</a></li>';
 $tools .= '<li><a href="/view/start.php" title="Click to go to the Home page">Video</a><li>';
} else {
 $tools .= '<li><a href="/index.php?action=reg" title="Click to register">Register</a></li>';
 $tools .= '<li><a href="/index.php?action=signin" title="Click to Login">Login</a></li>';
 $tools .= '<li><a href="/view/start.php" title="Click to go to the Home page">Video</a></li>';
}
$tools .= '</ul></nav>';
 echo $tools;
 ?>
