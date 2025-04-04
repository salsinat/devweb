 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="UTF-8" />
         <title>Authentification</title>
         <link rel="stylesheet" href="accueil.css" />
     </head>

     <body>
       <header>
         <h1>Sessions et authentification</h1>
       </header>
         <section>
             <h1>Authentification</h1>
             <form method="POST" action="login.php" name="add">
                 <table  class = "formulaire">
                     <tr>
                       <td><label for="login">Identifiant : </label></td>
                       <td><input type="text"  name="login" id="login" size = "20"
                                   value = "<?= htmlentities($identifiants['login']) ?>" /></td>
                     </tr>

                     <tr>
                       <td><label for="motDePasse">Mot de passe : </label></td>
                       <td><input type="password"  name="motDePasse" id="motDePasse" size = "20"
                                   value = ""  /></td>
                     </tr>
                 </table>
                 <div class = "centre">
                   <input type="submit" id="connexion" name="Connexion" value="Connexion" />
                 </div>
                <p class = "centre"><?= $message ?></p>
             </form>
         </section>
     </body>
 </html>
?>