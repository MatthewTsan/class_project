<?php
require_once('../model/day_db.php');
function add_order($db, $user_id, $size, $toppings) {
    $query = 'INSERT INTO pizza_orders (user_id, size, day, status) VALUES (:user_id, :size, :day, \'Preparing\')';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":size", $size);
    $day = get_day($db);
    $statement->bindValue(":day", $day);
    $statement->execute();
    
    $order_id = get_MaxOrderID($db);
    
    $query = 'INSERT INTO order_topping (order_id, topping) VALUES (:order_id, :topping)';
    $statement = $db->prepare($query);
    $statement->bindValue(":order_id", $order_id);
    foreach ($toppings as $topping):
        $statement->bindValue(':topping', $topping);
        $statement->execute();
    endforeach;
}

function get_orderByDay($db, $day) {
    $query = "SELECT * FROM pizza_orders WHERE day=:day";
    $statement = $db->prepare($query);
    $statement->bindValue(":day", $day);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_orderByUserId($db, $user_id) {
    $query = "SELECT * FROM pizza_orders WHERE user_id=:user_id";
    $statement = $db->prepare($query);
    $statement->bindValue("user_id", $user_id);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_orderByStatus($db, $status) {
    $query = "SELECT * FROM pizza_orders WHERE status=:status";
    $statement = $db->prepare($query);
    $statement->bindValue(":status", $status);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_toppingsByOrderId($db, $order_id) {
    $query = "SELECT * FROM order_topping WHERE order_id = :order_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":order_id", $order_id);
    $statement->execute();
    $toppings = $statement->fetchAll();
    $statement->closeCursor();
    return $toppings;
}

function get_MaxOrderID($db) {
    $query = 'SELECT MAX(id) from pizza_orders';
    $statement = $db->prepare($query);
    $statement->execute();
    $max_id = $statement->fetchAll();
    $statement->closeCursor();
    return $max_id[0][0];
}

function comfirmDeliever($db, $order_id) {
    $query = "UPDATE pizza_orders SET status = 'Finished' WHERE id=:order_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":order_id", $order_id);
    $statement->execute();
    $statement->closeCursor();
}

function setAllOrderFinish($db) {
    $query = "UPDATE pizza_orders SET status = 'Finished'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

function setOrderBaked($db, $order_id) {
    $query = "UPDATE pizza_orders SET status = 'Baked' WHERE id=:order_id" ;
    $statement = $db->prepare($query);
    $statement->bindValue(":order_id", $order_id);
    $statement->execute();
    $statement->closeCursor();
}