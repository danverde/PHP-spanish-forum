
<link rel="stylesheet" type="text/css" href="/dynamic_project/styles.css">
<?php
/* 
 * This sample header is for inclusion in the views, it is not stand alone
 */
$tools = '<nav><ul>';
if($_SESSION['loggedin']){
 $tools .= '<li><a href="/dynamic_project/index.php?action=logout" title="Click to logout">Logout</a></li>';
 $tools .= '<li><a href="/dynamic_project/view/student.php" title="Click to go to the Student page">Student</a></li>';
 $tools .= '<li><a href="/dynamic_project/view/start.php" title="Click to go to the Home page">Video</a><li>';
} else {
 $tools .= '<li><a href="/dynamic_project/index.php?action=reg" title="Click to register">Register</a></li>';
 $tools .= '<li><a href="/dynamic_project/index.php?action=signin" title="Click to Login">Login</a></li>';
 $tools .= '<li><a href="/dynamic_project/view/start.php" title="Click to go to the Home page">Video</a></li>';
}
$tools .= '</ul></nav>';
 echo $tools;
 ?>
