<?php include 'header.php'; ?>
    <section>
        <h2>Donate</h2>
        <p>This is where you can donate to the campaign.</p>
        <?php if(isset($donate_error)) echo $donate_error; ?>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="donate">
            <label>Payment Type:</label>
            <select name="payment_type">
                <option value="VISA">Visa</option>
                <option value="AMEX">American Express</option>
                <option value="MC">MasterCard</option>
                <option value="DISC">Discover</option>
                <option value="CASH">Cash</option>
            </select>
            <br>
            <label>Donation Amount:</label>
            <input type="text" name="donation_amount">
            <br>
            <label>First Name:</label>
            <input type="text" name="first_name"/>
            <br>
            <label>Last Name:</label>
            <input type="text" name="last_name"/>
            <br>
            <label>Number and Street:</label>
            <input type="text" name="street"/>
            <br>
            <label>City:</label>
            <input type="text" name="city"/>
            <br>
            <label>State:</label>
            <input type="text" name="state"/>
            <br>
            <label>Zip Code:</label>
            <input type="text" name="zip"/>
            <br>
<!--
            <p>If paying by card, please enter card details below:</p>
            <label>Credit Card Number</label>
            <input type="text">
            <br>
            <label>Expiration Date (format: MMYY)</label>
            <input type="text">
            <br>
-->
            <input type="submit" value="Donate!">
        </form>
    </section>
<?php include 'footer.php'; ?>