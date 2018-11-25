<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Today is day <?php echo $current_day; ?></h1>
        
        <!-- for testability, please do not change these two buttons -->
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="next_day">
            <input type="submit" value="Change To day <?php echo $current_day + 1; ?>" />
        </form>

        <form  action="index.php" method="post">
            <input type="hidden" name="action" value="initial_db">           
            <input type="submit" value="Initialize DB (making day = 1)" />
            <br>
        </form>      
        <br>
        <h2>Today's Orders</h2>
        <?php if(count($orders)!=0) {?>
        <table>
            <tr>
                <th>Day</th>
                <th>Size</th>
                <th>Toppings</th>
                <th>Status</th>
            </tr>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['day']?></td>
                <td><?php echo $order['size']?></td>
                <td>
                    <?php foreach ($toppings[$order['id']] as $topping): ?>
                        <?php echo $topping['topping']; ?>
                        <?php echo(" "); ?>
                    <?php endforeach;?>
                </td>
                <td><?php echo $order['status']?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <?php } else { echo("<h3>No orders</h3>"); }?>
    </section>
</main>
<?php include '../view/footer.php'; 