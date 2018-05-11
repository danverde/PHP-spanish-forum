<?php

function addComment($username, $topic, $comment){
    global $db;
    $query = 'INSERT INTO comments (username, topic, comment)
             VALUES (:username, :topic, :comment)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username, pdo::PARAM_STR);
    $stmt->bindValue(':topic', $topic, pdo::PARAM_STR);
    $stmt->bindValue(':comment', $comment, pdo::PARAM_STR);
    $stmt-> execute();
    $addedComment = $stmt ->rowCount();
    $stmt->closeCursor();
    
    return $addedComment;
}

function editComment($commentID, $comment){
    global $db;
    $query = 'UPDATE comments SET comment = :comment WHERE commentID = :commentID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindValue(':commentID', $commentID, PDO::PARAM_INT);
    $stmt-> execute();
    $editComment = $stmt ->rowCount();
    $stmt->closeCursor();
    
    return $editComment;
}

function deleteComment($commentID){
    global $db;
    $query = 'DELETE FROM comments WHERE commentID = :commentID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':commentID', $commentID);
    $stmt-> execute();
    $deleteComment = $stmt ->rowCount();
    $stmt->closeCursor();
    
//    return $deleteComment;
}

function getCommentsByTopic($topic){
    global $db;
    $query = 'SELECT commentID, username, topic, comment
             FROM comments WHERE topic = :topic
             ORDER BY commentID ASC';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':topic', $topic, PDO::PARAM_STR);
    $stmt-> execute();
    $comments = $stmt->fetchAll();
    
    return $comments;
}

function getCommentByID($commentID){
    global $db;
    $query = 'SELECT comment
             FROM comments WHERE commentID = :commentID
             ORDER BY commentID ASC';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':commentID', $commentID, PDO::PARAM_STR);
    $stmt-> execute();
    $comments = $stmt->fetch();
    
    return $comments;
}