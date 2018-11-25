<?php

require('../model/database.php');
require('../model/order_db.php');
require('../model/initial.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}

if ($action == "list_orders") {
    try {
        $orders = get_orderByStatus($db, "Preparing");
        $toppings = array();
        foreach ($orders as $order) {
            $toppings[$order['id']] = get_toppingsByOrderId($db, $order['id']);
        }

        $orders_baked = get_orderByStatus($db, "Baked");
        $users = array();
        foreach ($orders_baked as $order) {
            $users[] = get_userByID($db, $order['user_id']);
        }
        include("./order_list.php");
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }
} else if ($action == 'order_markBaked') {
    try {
        $orders = get_orderByStatus($db, "Preparing");
        if(count($orders) != 0) {
            $orders = $orders[0];
            setOrderBaked($db, $orders['id']);
        }
        header("Location: .");
    } catch (Exception $ex) {
        $error_message = $ex->getMessage();
        include('../errors/database_error.php');
    }

}