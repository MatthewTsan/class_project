<?php
require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_user';
    }
}

if ($action == 'list_user') {
    try {
        $users = get_user($db);
        include('user_list.php');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'show_add_user') {
    include("./user_add.php");
} else if ($action == 'add_user') {
    $user_name = filter_input(INPUT_POST, 'user_name');
    $user_room = filter_input(INPUT_POST, 'user_room');
    if ($user_name == NULL || $user_name == FALSE || $user_room == NULL || $user_room == FALSE) {
        $error = "Invalid user";
        include('../errors/error.php');
    } else {
        try {
            add_user($db, $user_name, $user_room);
        } catch (Exception $ex) {
            $error_message = $ex->getMessage();
            include('../errors/database_error.php');
            exit();
        }
    }
    header('Location: .');
} else if ($action == "delete_user") {
    $user_name = filter_input(INPUT_POST, 'user_name');
    $user_id = filter_input(INPUT_POST, 'user_id');
    $user_room = filter_input(INPUT_POST, 'user_room');
    try {
        delete_user($db, $user_name, $user_id, $user_room);
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    header('Location: .');
}