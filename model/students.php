<?php

function regClient($fName, $lName, $username, $email, $password){
    global $db;
    $query = 'INSERT INTO students (firstname, lastname, username, email, password) VALUES
            (:firstname, :lastname, :username, :email, :password)';
    $stmt = $db ->prepare($query);
    $stmt-> bindValue(':firstname', $fName, pdo::PARAM_STR);
    $stmt-> bindValue(':lastname', $lName, pdo::PARAM_STR);        
    $stmt-> bindValue(':username', $username, pdo::PARAM_STR);        
    $stmt-> bindValue(':email', $email, pdo::PARAM_STR);
    $stmt-> bindValue(':password', $password, pdo::PARAM_STR);
    $stmt-> execute();
    $regResult = $stmt ->rowCount();
    $stmt->closeCursor();
    return $regResult;
}

function validateEmail($email){
    global $db;
    $query = 'SELECT email FROM students WHERE email = :email';
    $stmt = $db ->prepare($query);        
    $stmt-> bindValue(':email', $email, pdo::PARAM_STR);
    $stmt-> execute();
    $emailReturn = $stmt->fetch();
    $stmt->closeCursor();
    
    return $emailReturn;
}

function validateUsername($username){
    global $db;
    $query = 'SELECT username FROM students WHERE username = :username';
    $stmt = $db ->prepare($query);        
    $stmt-> bindValue(':username', $username, pdo::PARAM_STR);
    $stmt-> execute();
    $usernameReturn = $stmt->fetch();
    $stmt->closeCursor();
    
    return $usernameReturn;
}

function getClientInfo($email){
    global $db;
    $query = 'SELECT studentID, firstname, lastname, username, email, password
            FROM students WHERE email = :email';
    $stmt = $db ->prepare($query);        
    $stmt-> bindValue(':email', $email, pdo::PARAM_STR);
    $stmt-> execute();
    $clientInfo = $stmt->fetch();
    $stmt->closeCursor();
    
    return $clientInfo;
}