<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Add Donation</h3>
        <p>
            This is where you will add a voter's donation.
        </p>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="add-donation">
            
            <select name="registered">
                <option value="VISA">Visa</option>
                <option value="AMEX">American Express</option>
                <option value="MC">MasterCard</option>
                <option value="DISC">Discover</option>
                <option value="CASH">Cash</option>
                <option value="CHECK">Check</option>
                <option value="PAYPAL">PayPal</option>
            </select>
            <br>
            <label>Credit Card Number</label>
            <input type="text">
            <br>
            <label>Name on Card</label>
            <input type="text">
            <br>
            <label>Expiration Date (format: MMYY)</label>
            <input type="text">
            <br>
            <label>Billing ZIP Code</label>
            <input type="text">
            <br>
            <label>Donation Amount</label>
            <input type="text">
            <br>
            <input type="submit" value="Donate!">
        </form>
        <br>
        <a href="./index.php?action=list-donations">List Donations =></a>
    </section>
<?php include 'footer.php'; ?>      