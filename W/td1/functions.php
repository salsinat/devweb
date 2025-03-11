<?php
function afficheTab(array $tableau): void {
    echo "<table> <tr>";
    foreach ($tableau as $valeur) {
        echo "<td> $valeur </td>";
    }
    echo "</tr> </table>";
};

function cropChaine(string $chaine): string {
    while ($chaine[0] === " ") {
        $chaine = substr($chaine, 1);
    }
    while ($chaine[strlen($chaine) - 1] === " ") {
        $chaine = substr($chaine, 0, strlen($chaine) - 1);
    }
    return $chaine;
}

function chaineVersTab(string $chaine): array {
    $tab = [];
    $mot = "";
    $chaine = cropChaine($chaine);
    for ($i = 0; $i < strlen($chaine); $i++) {
        if ($chaine[$i] == " ") {
            $tab[] = $mot;
            $mot = "";
        } else {
            $mot .= $chaine[$i];
        }
    }
    $tab[] = $mot;
    return $tab;
};

function afficheTabCles(array $tab) : void {
    echo "<table> <tr>";
    foreach ($tab as $cle => $valeur) {
        echo "<th> $cle </th>";
    }
    echo "</tr> <tr>";
    foreach ($tab as $cle => $valeur) {
        echo "<td> $valeur </td>";
    }
    echo "</tr> </table>";
}

function afficheTab2(array $tab2) : void {
    echo "<table>";
    foreach ($tab2 as $tab) {
        echo "<tr>";
        foreach ($tab as $valeur) {
            echo "<td> $valeur </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>