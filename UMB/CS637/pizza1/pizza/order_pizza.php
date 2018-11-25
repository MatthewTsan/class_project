<?php include '../view/header.php'; ?>
<main>
    <h1> Welcome to the Pizza Shop </h1>
    <form action="./index.php?action=order_add" style="float: left" method="POST">
        <b>Pizza Size:</b> <br/><br/>
        <?php foreach ($sizes as $size):?>
        <input type="radio" name='size' value="<?php echo $size['size'] ?>" />
            <?php echo $size['size'] ?>
        <?php echo(" "); endforeach;?>
        <br/><br/>
        
        <b>Toppings:</b><br/><br/>
        <?php foreach ($toppings as $topping): ?>
        <input type="checkbox" name="topping[]" value="<?php echo $topping['topping'] ?>"/>
            <?php echo $topping['topping']?>
        <?php endforeach; ?>
        <br/><br/>
        <style type="text/css">
            label {  float: left; width: 5em;}
        </style>
        <label>Username:</label>
        
        <select name="user_id">
            <?php foreach ($users as $user):?>
            <option value="<?php echo $user['id']?>"><?php echo $user['username']?></option>
            <?php endforeach; ?>
        </select><br/><br/>
        <input type="submit" value="Order Pizza">
    </form><br/><br/>
</main>
<?php include '../view/footer.php'; ?>