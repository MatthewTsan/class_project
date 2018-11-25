<?php
// reestablish initial database contents
// Don't change this, or put it back this way for delivery

function initial_db($db) {
    $query = 'delete from order_topping;';
    $query.='delete from pizza_orders;';
    $query.='delete from menu_sizes;';
    $query.='delete from menu_toppings;';
    $query.='delete from shop_users;';
    $query.='delete from pizza_sys_tab;';
    $query.='insert into pizza_sys_tab values (1);';
    $query.="insert into menu_toppings values (1,'Pepperoni');";
    $query.="insert into menu_sizes values (1,'Small');";
    $query.="insert into menu_sizes values (1,'Large');";
    $query.="insert into shop_users values (1,'joe', 6);";
    $query.="insert into shop_users values (1,'sue', 3);";
    
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
