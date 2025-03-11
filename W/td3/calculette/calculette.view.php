<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="calculette.css">
</head>
<body>
    <section>
        <h1>Calculette</h1>
        <form action="calculette.php" method="get">
            <p>Entrez deux entiers :</p>
            <label>Valeur 1 :</label>
            <input type="number" name="valeur1"
                placeholder="entrez un entier"
                value="<?= $entier1 ?>">
            <br><br>
            <label>Valeur 2 :</label>
            <input type="number" name="valeur2"
                placeholder="entrez un entier"
                value="<?= $entier2 ?>">
            <p>Faites les opérations de votre choix :</p>
            <input type="submit" value="+" name="+" class="calc">
            <input type="submit" value="*" name="*" class="calc">
            <input type="submit" value="-" name="-" class="calc">
            <input type="submit" value="/" name="/" class="calc">
            <input type="submit" value="vider" name="vider">
        </form>
        <?php if($ok) afficheRes($entier1, $entier2, $op, $res);
              else echo $msg; ?>
    </section>
</body>