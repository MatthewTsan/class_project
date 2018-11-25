<?php

function get_user($db) {
    $query = "SELECT * FROM shop_users";
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function get_userByID($db, $user_id) {
    $query = "SELECT * FROM shop_users WHERE id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users[0];
}

function add_user($db, $user_name, $user_room) {
    $query = 'INSERT INTO shop_users
                 (username, room)
              VALUES
                 (:username, :room)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $user_name);
    $statement->bindValue(':room', $user_room);
    $statement->execute();
    $statement->closeCursor();
}

function delete_user($db, $user_name, $user_id, $user_room) {
    $query = 'DELETE FROM shop_users WHERE username = :username and room = :room';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $user_name);
    $statement->bindValue(':room', $user_room);
    $statement->execute();
    $statement->closeCursor();
}