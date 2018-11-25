<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        
        <h2>Available Sizes</h2><br/>
        <?php 
            foreach($sizes as $size): 
                echo($size['size']); 
                echo(" ");
            endforeach;
        ?>
        <br/><br/><br/>
        <h2>Available Toppings</h2><br/>
        <?php 
            foreach($toppings as $topping): 
                echo($topping['topping']); 
                echo(" ");
            endforeach;
        ?>
        <br/><br/><br/>
        <form action="./index.php" method="POST">
            <style type="text/css">
                label {  float: left; width: 5em;}
            </style>
            <label>Username:</label>
            <select name='user_id'>
                <?php foreach ($users as $user):?>
                <option value = <?php echo $user['id']?> ><?php echo $user['username']?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name='action' value="order_list"/>
            <input type="submit" value="Show Your Orders">
        </form> <br/><br/><br/>
        <a href="./index.php?action=order_pizza">Order Pizza</a><br/><br/>
    </section>
</main>
<?php include '../view/footer.php'; 