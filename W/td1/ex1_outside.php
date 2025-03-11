<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <h1><?php echo "Bonjour"; ?></h1>
    <?php
        $nom =  "Olivier";
        echo "$nom";

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>