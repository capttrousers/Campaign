<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Add Donation</h3>
        <p>
            This is where you will add a voter's donation.
        </p>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="add-donation">
            <input type="hidden" name="voter_id" 
                   value="<?php echo $voter['voter_id']; ?>">
            <label>Voter:</label>
            <p><?php echo $voter['first_name'].' '.$voter['last_name']; ?></p>
            <br>      
            <label>Payment Type:</label>
            <select name="payment_type">
                <option value="VISA">Visa</option>
                <option value="AMEX">American Express</option>
                <option value="MC">MasterCard</option>
                <option value="DISC">Discover</option>
                <option value="CASH">Cash</option>
            </select>
            <br>
<!--
            <label>Credit Card Number</label>
            <input type="text">
            <br>
            <label>Expiration Date (format: MMYY)</label>
            <input type="text">
-->
            <br>
            <label>Billing ZIP Code:</label>
            <p>
                <?php if(!is_null($voter['loc_zip'])) echo $voter['loc_zip'];
                        else echo 'No Zip Code on file for voter'; ?>
            </p>
            <br>
            <label>Donation Amount:</label>
            <input type="text" name="donation_amount">
            <br>
            <br>
            <input type="submit" value="Add Donation">
        </form>
        <br>
        <a href="./index.php?action=list-donations">List Donations =></a>
    </section>
<?php include 'footer.php'; ?>      