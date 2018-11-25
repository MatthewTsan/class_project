<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>User List</h1>
        <table>
            <tr>
                <th>
                    Username
                </th>
                <th>
                    Room
                </th>
                <th>
                    &nbsp;
                </th>
                
                <?php
                foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['room'] ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_user">
                        <input type="hidden" name="user_name" value="<?php echo $user['username'] ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                        <input type="hidden" name="user_room" value="<?php echo $user['room']?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
                
                <?php endforeach; ?>
            </tr>
        </table>
        <p>
            <a href="./index.php?action=show_add_user">Add User</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 