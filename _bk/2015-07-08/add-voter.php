<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Add Voter</h3>
        <p>
            This is where you will enter and edit voter information.
        </p>
        <?php if(isset($add_voter_error)) echo $add_voter_error; ?>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="add-voter">
            
            <label>First Name</label>
            <input type="text" name="first_name">
            <br>
            <label>Last Name</label>
            <input type="text" name="last_name">
            <br>
            <label>Phone Number</label>
            <input type="text" name="phone">
            <br>
            <label>Email Address</label>
            <input type="text" name="email">
            <br>
            <br>
            <label>Registered to vote?</label>
            <select name="registered">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Add Voter" style="border-radius:3px;">
        </form>
        <br>
        <a href="./index.php?action=list-voters">List Voters =></a>
    </section>
<?php include 'footer.php'; ?>