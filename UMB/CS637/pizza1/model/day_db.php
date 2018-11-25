<?php
function get_day($db) {
    $query = 'SELECT current_day FROM pizza_sys_tab';
    $statement = $db->prepare($query);
    $statement->execute();
    $day = $statement->fetchAll();
    return $day[0][0];    
}

function next_day($db, $current_day) {
    $query = 'UPDATE pizza_sys_tab SET current_day=:next_day';
    $statement = $db->prepare($query);
    $statement->bindValue(":next_day", ((Int)$current_day)+1);
    $statement->execute();
    $statement->closeCursor();
}