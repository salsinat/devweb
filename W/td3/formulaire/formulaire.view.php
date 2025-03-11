<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="formulaire.css">
</head>

<body>
    <section>
        <h1>Formulaire de saisie</h1>
        <form action="formulaire.php" method="post">
            <fieldset class="identite">
                <legend>Saisie des données personnelles</legend>
                <label>NOM :</label>
                <input type="text" name="nom"
                    placeholder="entrez votre nom"
                    value="<?= $nom ?>">
                <label>Prénom :</label>
                <input type="text" name="prenom"
                    placeholder="entrez votre prénom"
                    value="<?= $prenom ?>">
                <label>Age :</label>
                <input type="number" name="age"
                    placeholder="entrez un entier"
                    value="<?= $age ?>">
                <label>Genre :</label>
                <div>
                    <input type="radio" name="genre"
                        value="F">Féminin
                    <input type="radio" name="genre"
                        value="M">Masculin
                    <input type="radio" name="genre" checked="checked"
                        value="A">Autre
                </div>
            </fieldset>
            <fieldset>
                <legend>Compétences dans les langages informatiques</legend>
                <?php 
                $langages_dispos = ["C","Java","TypeScript","PHP","C++","Cobol"];
                foreach($langages_dispos as $l) {
                    echo "<input type=\"checkbox\" name=\"langages[$l]\">$l";
                }?>
                <input type="checkbox" name="langages[autre]" checked="checked">Aucun
            </fieldset>
            <fieldset>
                <legend>Langue maternelle</legend>
                <select name="langues[]">
                    <?php 
                    $langues_dispos = ['Français', 'Anglais', 'Allemand', 
                    'Arabe', 'Chinois','Espagnol','Portugais'];
                    foreach($langues_dispos as $l) {
                        echo "<option value=\"$l\">$l</option>";
                    } ?>
                </select>
            </fieldset>
            <input type="submit" name="valider" value="Validez">
            <input type="reset" name="reset" value="Annulez">
            <input type="reset" name="resetPHP" value="Réinitialisez">
        </form>
        <?php if ($ok) afficheRes($nom, $prenom, $age, $genre, $langages, $langue);
        else echo $msg; ?>
    </section>
</body>