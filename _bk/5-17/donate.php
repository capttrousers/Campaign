<?php include 'header.php'; ?>
    <section>
        <h3>Donate</h3>
        <p>This is where you can donate to the campaign.</p>
        <p>
            THIS PAGE UNDER CONSTRUCTION!!!
        </p>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="donate">
            
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
    </section>
<?php include 'footer.php'; ?>