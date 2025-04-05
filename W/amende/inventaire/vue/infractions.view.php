<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Infractions</title>
    <link rel="stylesheet" href="../vue/style/style.css">
</head>
<body>
    <?php ini_set("display_errors",1);?>
<?php require_once('../vue/header.php'); ?>

 
<section>
    <label></label>
    <h1>Liste des infractions</h1>
</section>
    <table border="1">
        <thead>
            <tr>
                <th>ID Infraction</th>
                <th>Date Infraction</th>
                <th>Numéro Immatriculation</th>
                <th>Conducteur</th>
                <th>Montant</th>
                <?php if ($_SESSION['is_admin']) { 
                echo '<th>Modifier</th>
                <th>Supprimer</th>
                ';
                }
                ?>

                <?php if ($_SESSION['is_admin'] || !$_SESSION['is_admin'] ) {echo '<th>Visualiser</th>';} ?>
            </tr>
        </thead>
        <tbody>
            <?php echo implode("", $lignes); ?>
        </tbody>
    </table>
    <?php if ($_SESSION['is_admin']) {echo '<a id="ajout" href="editInfraction.php?op=a">Ajouter:<img src="../vue/style/ajout.png"></a>';} ?>

<!-- À placer avant la fermeture du </body> -->
<div id="confirmationOverlay" class="modal-overlay" style="display: none;">
  <div class="modal-box">
    <div class="modal-content">
      <h3>Confirmation requise</h3>
      <p>Êtes-vous sûr de vouloir supprimer cette infraction ?</p>
      <div class="modal-actions">
        <button id="confirmCancel" class="btn-cancel">Annuler</button>
        <button id="confirmDelete" class="btn-confirm">Supprimer</button>
      </div>
    </div>
  </div>
</div>


<script>
window.onload = function() {
  const overlay = document.getElementById('confirmationOverlay');
  
  document.querySelectorAll('.delete-infraction').forEach(link => {
    link.onclick = function(e) {
      e.preventDefault();
      overlay.style.display = 'flex';
      document.body.style.overflow = 'hidden';
      
      document.getElementById('confirmDelete').onclick = function() {
        window.location.href = 'editInfraction.php?op=s&id_inf=' + link.getAttribute('data-id');
      };
    };
  });

  document.getElementById('confirmCancel').onclick = function() {
    overlay.style.display = 'none';
    document.body.style.overflow = 'auto';
  };

  overlay.onclick = function(e) {
    if (e.target === overlay) {
      overlay.style.display = 'none';
      document.body.style.overflow = 'auto';
    }
  };
};
</script>
</body>

</html>
