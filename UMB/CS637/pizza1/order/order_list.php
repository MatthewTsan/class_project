<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Current Orders Report</h1>
        <h2>Orders Baked but not delivered</h2>
        <?php foreach($users as $user):?>
        ID:<?php echo $user['id']?> User <?php echo $user['username']?><br/>
        <?php endforeach;?>
        <h2>Orders Preparing(in the oven): Any ready now?</h2>
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
        <?php } else { echo("<br>No orders are being prepared in Oven<br/>"); }?>
        <br/><br/>
        <form>
            <input type="hidden" name="action" value="order_markBaked"/>
            <input type="submit" value="Mark Oldest Pizza Baked"/>
        </form>
        <br/>  
    </section>
</main>
<?php include '../view/footer.php'; 