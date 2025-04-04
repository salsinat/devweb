<?php
ini_set("display_errors",1);
session_start();
?>

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
    <label  for="id_inf">ID Infraction :</label>
    <div>
        <!-- htmlentities nécessaire pour les chaînes de caractères -->
        <input id="id_inf" name="id_inf" type="text" size="5" maxlength="5" value="<?= $valeurs['id_inf'] ?>" readonly/>
        <br/>
        <span class="erreur"><?= $erreurs['id_inf'] ?></span>
    </div>
</section>

<section>
    <label for="date_inf">Date de l'infraction :</label>
    <div>
        <input id="date_inf" name="date_inf" type="date" value="<?= $valeurs['date_inf'] ?>" <?php echo $detail?'Readonly':''; ?>/>
        <br />
        <span class="erreur"><?= $erreurs['date_inf'] ?></span>
    </div>
</section>

<section>
    <label for="no_immat">Numéro d'immatriculation :</label>
    <div>
        <input id="no_immat" name="no_immat" type="text" size="15" maxlength="15" value="<?= $valeurs['no_immat'] ?>" <?php echo $detail?'Readonly':''; ?>/>
        <br />
        <span class="erreur"><?= $erreurs['no_immat'] ?></span>
    </div>
</section>

<section>
    <label for="no_permis">Numéro de permis :</label>
    <div>
        <input id="no_permis" name="no_permis" type="text" size="15" maxlength="15" value="<?= $valeurs['no_permis'] ?>" <?php echo $detail?'Readonly':''; ?>/>
        <br />
    </div>
</section>

<section> 
    <label for="delits">Delits :</label>
    <div>
        <select name="delits" id="delits">
            <?php
                
            ?>
        </select>
    </div>
</section>

<section>
    <label>&nbsp;</label>
    <div>
        <?php
        if (!$detail) {
            echo '<input type="submit" id="valider" name="valider" value="Valider" />';
        }?>
        
        &emsp;
        <input type="submit" id="annuler" name="annuler" value="<?= $detail?"Retour":"Annuler"; ?>"/>
    </div>
</section>

</form>

</body>
</html>
