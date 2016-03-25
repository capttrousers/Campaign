<!DOCTYPE html>
<html>
<head>
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Admin Log-In Page</h1>
    </header>
    <section>
        <p>
            Please log in with your admin credentials to add and edit voter information.
        </p>
        <form action="." method="post" class="dataform">
            <input type="hidden" name="action" value="login">
            
            <label>Username: </label>
            <input type="text" name="login">
            <br>
            <label>Password: </label>
            <input type="text" name="pw">
            <br>
            <br>
            <input type="submit" value="Log-In" style="border-radius:3px;">
        </form>
        <?php if(isset($login_message)) echo "<br><br><p>$login_message</p>"; ?>
    </section>
    <br>
    <br>
    <footer>
        <a href="campaign.html">Campaign HQ</a>
    </footer>
</body>
</html>