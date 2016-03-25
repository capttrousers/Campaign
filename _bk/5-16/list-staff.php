<!DOCTYPE html>
<html>
<head>
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Admin</h1>
    </header>
    <section>
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
                        <form action=".">
                            <input type="submit" value="Edit" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <br>
    <br>
    <footer>
        <a href="campaign.html">Campaign HQ</a>
    </footer>
</body>
</html>