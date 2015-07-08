<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Add Staff</h3>
        <p>
            This is where you will enter staff / volunteer information.
        </p>
        <?php if(isset($add_staff_error)) echo $add_staff_error; ?>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="add-staff">
            
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
            <p>
                Now choose a username and password to use when logging into the campaign site.
            </p>
            <label>Username</label>
            <input type="text" name="login">
            <br>
            <label>Password</label>
            <input type="text" name="pw">
            <br>
            <br>
            <input type="submit" value="Add Staff" style="border-radius:3px;">
        </form>
        <br>
        <a href="./index.php?action=list-staff">List Staff =></a>
    </section>
<?php include 'footer.php'; ?>