<!DOCTYPE html>
<html>
<head>
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="./index.php?action=donate">
            <div class="donate button">
                Donate
            </div>
        </a>
        <a href="./index.php?action=admin">
            <div class="admin button">
                Admin
            </div>
        </a>
        <?php if(isset($_SESSION['is_valid_admin'])) : ?>
        <a href="./index.php?action=logout">
            <div class="logout button">
                Logout
            </div>
        </a>
        <?php endif; ?>
        <h1 id="header_title">Campaign HQ</h1>
    </header>