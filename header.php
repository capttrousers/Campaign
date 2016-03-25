<!DOCTYPE html>
<html>
<head>
    <link href="stylesheet.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>

<body>
    <header>

        <div id="left">
 
            <a href="./index.php?action=admin" class="admin button">
                Admin
            </a>

	    <?php if(isset($_SESSION['is_valid_admin'])) : ?>
	            <a href="./index.php?action=logout" class="logout button">
	                Logout
	            </a>
	    <?php endif; ?>
	    
        </div>
        
        <div id="right">
            <a href="./donate.php" class="donate button">
                Donate
            </a>
        </div>

        <h1 id="header_title">
            <a href="index.php?action=home">Campaign HQ</a>
        </h1>

    </header>