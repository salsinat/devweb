<!DOCTYPE html>
<html>
<head>
    <title>Bonjour</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $personnages = [
            [
                'id_pers' => 1,
                'nom' => 'Skywalker',
                'prenom' => 'Luke',
            ],
            [
                'id_pers' => 2,
                'nom' => 'Solo',
                'prenom' => 'Han',
                
            ],
            [
                'id_pers' => 3,
                'nom' => 'Organa',
                'prenom' => 'Leia',
            ],
            [
                'id_pers' => 4,
                'nom' => 'Vader',
                'prenom' => 'Darth',
            ],
            [
                'id_pers' => 5,
                'nom' => 'Kenobi',
                'prenom' => 'Obi-Wan',
            ],
            [
                'id_pers' => 6,
                'nom' => 'Palpatine',
                'prenom' => 'Sheev',
            ],
            [
                'id_pers' => 7,
                'nom' => 'Amidala',
                'prenom' => 'Padmé',
            ],
            [
                'id_pers' => 8,
                'nom' => 'Maul',
                'prenom' => 'Darth',
            ],
            [
                'id_pers' => 9,
                'nom' => 'Fett',
                'prenom' => 'Boba',
            ],
            [
                'id_pers' => 10,
                'nom' => 'Windu',
                'prenom' => 'Mace',
            ],
            [
                'id_pers' => 11,
                'nom' => 'Tano',
                'prenom' => 'Ahsoka',
            ],
            [
                'id_pers' => 12,
                'nom' => 'Dooku',
                'prenom' => 'Count',
            ],
        ];

        echo "<table>";
        echo "<tr><th>id_pers</th><th>nom</th><th>prenom</th></tr>";
        foreach ($personnages as $personnage) {
            echo "<tr>";
            foreach ($personnage as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</body>
</html>