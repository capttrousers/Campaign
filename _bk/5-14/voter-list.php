<?php include 'database.php' ; ?>

<!DOCTYPE html>
<html>
<head>
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Voter List</h1>
    </header>
    <section>
        <p>
            This is the contents of the voter database.
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