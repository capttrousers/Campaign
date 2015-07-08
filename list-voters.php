<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Voter List</h3>
        <p>
            This is the contents of the voter table.
        </p>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($voters as $voter) : ?>
                <tr>
                    <td><?php echo $voter['first_name'] . ' ' . $voter['last_name']; ?></td>
                    <td><?php echo $voter['email']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="edit-voter-form"/>
                            <input type="hidden" name="voter_id" 
                                   value="<?php echo $voter['voter_id']; ?>"/>
                            <input type="submit" value="Edit"/>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="add-donation-form"/>
                            <input type="hidden" name="voter_id" 
                                   value="<?php echo $voter['voter_id']; ?>"/>
                            <input type="submit" value="Add Donation"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php include 'footer.php'; ?>