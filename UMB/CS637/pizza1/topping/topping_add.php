<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Add topping</h1>
        <form action="./index.php?action=add_topping" method="POST">
            Topping Name: <input type="text" name="topping_name"><br/><br/>
            <input type="submit" value="Add">
        </form>
        <br/><br/>
         <a href="./index.php">View Topping List</a>
    </section>
</main>
<?php include '../view/footer.php'; 