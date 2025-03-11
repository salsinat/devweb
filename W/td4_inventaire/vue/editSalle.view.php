<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <label></label>
        <h1><?php echo $titre; ?></h1>
    </section>
    <form method="post">
        <section>
            <label for="num">Numéro :</label>
            <div>
                <?php if ($editNum): ?>
                    <input id="num" name="num" type="text" size="5" maxlength="5" value="<?php echo $valeurs['num']; ?>" />
                    <br/>
                    <span class="erreur"><?php echo $erreurs['num']; ?></span>
                <?php else: ?>
                    <div><?php echo $valeurs['num']; ?></div>
                <?php endif; ?>
            </div>
        </section>
        <section>
            <label for="libelle">Désignation :</label>
            <div>
                <input id="libelle" name="libelle" type="text" value="<?php echo $valeurs['libelle']; ?>" />
                <br/>
                <span class="erreur"><?php echo $erreurs['libelle']; ?></span>
            </div>
        </section>
        <section>
            <label for="etage">Etage :</label>
            <div>
                <select name="etage">
                    <?php foreach ($etages as $cle => $valeur): ?>
                        <option value="<?php echo $cle; ?>" <?php echo ($valeurs['etage'] == $cle) ? 'selected' : ''; ?>><?php echo $valeur; ?></option>
                    <?php endforeach; ?>
                </select>
                <br/>
                <span class="erreur"><?php echo $erreurs['etage']; ?></span>
            </div>
        </section>
        <section>
            <label></label>
            <div>
                <input type="submit" name="valider" value="Valider" />
                <input type="submit" name="annuler" value="Annuler" />
            </div>
        </section>
    </form>
</body>
</html>
