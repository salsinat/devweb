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
            <label for="id">Equipement :</label>
            <div>
                <?php if ($editId): ?>
                    <select name="id">
                        <?php foreach ($libelles as $cle => $libelle): ?>
                            <option value="<?php echo $cle; ?>" <?php echo ($valeurs['id'] == $cle) ? 'selected' : ''; ?>><?php echo $libelle; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br/>
                    <span class="erreur"><?php echo $erreurs['id']; ?></span>
                <?php else: ?>
                    <div><?php echo $valeurs['id']; ?></div>
                <?php endif; ?>
            </div>
        </section>
        <section>
            <label for="qte">Quantité :</label>
            <div>
                <input id="qte" name="qte" type="number" value="<?php echo $valeurs['qte']; ?>" />
                <br/>
                <span class="erreur"><?php echo $erreurs['qte']; ?></span>
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
