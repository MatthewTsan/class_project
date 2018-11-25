<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        
        <h2>Your Orders:</h2><br/>
        <?php if(count($orders)!=0) {?>
        <table>
            <tr>
                <th>Day</th>
                <th>Size</th>
                <th>Toppings</th>
                <th>Status</th>
                <th>Comfirm Deliever</th>
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
                <?php if ($order['status'] == 'Baked') { ?>
                <td>
                    <form action='./' method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']?>"/>
                        <input type="hidden" name="action" value="order_comfirm"/>
                        <input type="submit" value="Comfirm the deliver">
                    </form>
                </td>
                <?php } else { echo("<td></td>");}?>
            </tr>
            <?php endforeach;?>
        </table>
        <?php } else { ?>
        <h3><?php echo("No orders"); }?></h3>
    </section>
</main>
<?php include '../view/footer.php'; 