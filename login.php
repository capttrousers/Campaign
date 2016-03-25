<?php include 'header.php'; ?>
    <section>
        <h2>Admin Log-In Page</h2>
        <p>
            Please log in with your admin credentials to add and edit voter information.
        </p>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="login">
            
            <label>Username: </label>
            <input type="text" name="login">
            <br>
            <!--<p style="color:red;">MAKE PASSWORD INPUT FORM UNREADABLE!</p>-->
            <label>Password: </label>
            <input type="password" autocomplete="off" name="pw">
            
            <br>
            <br>
            <input type="submit" value="Log-In" style="border-radius:3px;">
        </form>
        <?php if(isset($login_message)) {
            echo "<br><br><h4 style='color:red;'>$login_message</h4>"; 
        } ?>
    </section>
<?php include 'footer.php'; ?>