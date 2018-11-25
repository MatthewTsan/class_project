<?php include '../view/header.php';?>
<main>
    <section>
        <h1>Add User</h1>
        <form action="./index.php?action=add_user" method="POST">
            <label style="float: left; width: 7em">Username: </label>
                <input  type="text" name="user_name"><br/><br/>
                <label style="float: left; width: 7em">Room: </label>
            <select name="user_room">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><br/><br/>
            <input type="submit" value="Add User"/>
        </form>
    </section>
</main>
<?php include '../view/footer.php'; ?>