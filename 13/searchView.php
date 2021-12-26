<html>
    <form action="Controller.php" method="post">
        <input type="submit" value="Search">
        <input size=40 type="text" name="name" value="<?php echo $name?>" placeholder="Name Starts With">
    </form>
    <?php if (!empty($data)) { ?>
        <table border="1" cellspacing="0" cellpadding="2">
            <tr>
            <th>Name</th>
            <th>Provider</th>
            <th></th>
            <th></th>
            <th></th>
            </tr>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo$row['person_name']?></td>
                    <td><?php echo$row['provider_number']?></td>
                    <td><a href="Controller.php?viewid=<?php echo $row['personID']?>">Details</a></td>
                    <td><a href="Controller.php?editid=<?php echo $row['personID']?>">Edit</a></td>
                    <td><a onclick="return confirm('Delete?');" href="Controller.php?deleteid=<?php echo $row['personID']?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</html>


