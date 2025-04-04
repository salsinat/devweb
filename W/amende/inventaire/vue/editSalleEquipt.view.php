<html>
<head>
<meta charset="utf-8">
<title><?php echo $titre ?></title>
<link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>

<?php require_once('../vue/header.php'); ?>

<section>
    <label></label>
    <h1><?php echo $titre ?></h1>   
</section>

<form name="add" action="" method="post">
<section>
    <label  for="id">Equipement :</label>
    <div>   
        <?php
        if ($editId) {
            echo '<select name = "id" />';
            foreach ($libelles as $cle=>$libelle){
                echo "<option value='$cle'";
                if ($cle == $valeurs['id']) {
                    echo ' selected ';
                }
                echo ">", $libelle, "</option>";
            }
            echo '</select';
        }
        else echo '<b>', $valeurs['libelle'], '</b>';
        ?>
        <br/>
        <span   class="erreur"><?= $erreurs['id'] ?></span>
    </div>
</section>
<section>
    <label  for="qte">Quantité :</label>
    <div>
	    <input	id="qte" name="qte"	type="number" min="0" step="1" value="<?= $valeurs['qte'] ?>" />
	    <br/>
        <span   class="erreur"><?= $erreurs['qte'] ?></span>
    </div>
</section>
<section>
    <label>&nbsp;</label>
    <div>
        <input type="submit" id="valider" name="valider" value="Valider" />
        &emsp;
        <input type="submit" id="annuler" name="annuler" value="Annuler" />
    </div>
</section>

</form>

</body>
</html>