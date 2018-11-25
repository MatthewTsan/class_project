<?php
require('../model/database.php');
require('../model/order_db.php');
require('../model/user_db.php');
require('../model/size_db.php');
require('../model/topping_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'student_welcom';
    }
}

if ($action == 'student_welcom') {
    try {
        $users = get_user($db);
        $sizes = get_sizes($db);
        $toppings = get_toppings($db);
        include('student_welcome.php');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'order_pizza') {
    try {
        $sizes = get_sizes($db);
        $toppings = get_toppings($db);
        $users = get_user($db);
        include('order_pizza.php');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == "order_add") {
    $sizes = filter_input(INPUT_POST, 'size');
    $user_id = filter_input(INPUT_POST, 'user_id');
    $toppings = $_POST['topping'];
    try {
        add_order($db, $user_id, $sizes, $toppings);
        header("Location: .");
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'order_list') {
    try {
        $user_id = filter_input(INPUT_POST, 'user_id');
        $orders = get_orderByUserId($db, $user_id);
        $toppings = array();
        foreach ($orders as $order) {
            $toppings[$order['id']] = get_toppingsByOrderId($db, $order['id']);
        }
        include('./student_orderList.php');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'order_comfirm') {
    try {
        $order_id = filter_input(INPUT_POST, "order_id");
        comfirmDeliever($db, $order_id);
        header('Location: .');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
}

