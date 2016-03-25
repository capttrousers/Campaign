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
        <h3>Voter List</h3>
        <p>
            This is the contents of the voter table.
        </p>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <?php foreach ($voters as $voter) : ?>
                <tr>
                    <td><?php echo $voter['first_name'] . ' ' . $voter['last_name']; ?></td>
                    <td><?php echo $voter['email']; ?></td>
                    <td>
                        <form >
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