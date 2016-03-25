<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Staff List</h3>
        <p>
            This is the contents of the voter table.
        </p>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Username</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($staffs as $staff) : ?>
                <tr>
                    <td><?php echo $staff['first_name'] . ' ' . $staff['last_name']; ?></td>
                    <td><?php echo $staff['email']; ?></td>
                    <td><?php echo $staff['phone']; ?></td>
                    <td><?php echo $staff['login']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="edit-staff-form"/>
                            <input type="hidden" name="staff_id" 
                                   value="<?php echo $staff['staff_id']; ?>"/>
                            <input type="submit" value="Edit" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php include 'footer.php'; ?>