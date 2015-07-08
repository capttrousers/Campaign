<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Donations List</h3>
        <p>
            This is the contents of the donation table.
        </p>
        <table>
            <tr>
                <th>Name</th>
                <th>Donation Date</th>
                <th>Amount</th>
                <!-- <th>&nbsp;</th> -->
            </tr>
            <?php foreach ($donations as $donation) : ?>
                <tr>
                    <td><?php echo $donation['name']; ?></td>
                    <td><?php echo $donation['donation_date']; ?></td>
                    <td><?php echo $donation['donation_amount']; ?></td>
                    <!-- 
                    *** needed? ***
                    <td>
                        <form>
                            <input type="submit" value="Edit" />
                        </form>
                    </td>
                    -->
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php include 'footer.php'; ?>