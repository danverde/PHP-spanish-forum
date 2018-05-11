<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Server Error</title>
    </head>
    <body>
        <h1>Server Error</h1>
        <?php
        if (isset($message)){
            echo '<p>'.$message.'</p>';
        }
        ?>
    </body>
</html>
