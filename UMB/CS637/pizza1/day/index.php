<?php

require('../model/database.php');
require('../model/initial.php');
require('../model/day_db.php');
require('../model/order_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'day_list';
    }
}

$current_day = get_day($db); 

if ($action == 'initial_db') {
    try {
        initial_db($db);
        header("Location: .");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include ('../errors/database_error.php');
        exit();
    }
} else if ($action == 'day_list') {
    try {
        $orders = get_orderByDay($db, $current_day);
        $toppings = array();
        foreach ($orders as $order) {
            $toppings[$order['id']] = get_toppingsByOrderId($db, $order['id']);
        }
        include('./day_list.php');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'next_day') {
    try {
        next_day($db, $current_day);
        setAllOrderFinish($db);
        header('Location: .');
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
}
