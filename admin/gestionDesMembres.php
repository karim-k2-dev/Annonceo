<?php
    include_once('../include/init.php');


 // Sécurité
    // la page admin est accessible seulement si un utilisateur est connecté
    if(!adminConnecte())
    {
        header("Location:" . URL . "erreur.php?acces=interdit"); exit;
    }


    
    include_once('../include/header.php');
?>

<?php if(isset($_GET['action']) && ($_GET['action'] == "afficher")) : 
    include_once('../include/header.php');
    $pdoStatement = $pdoObject->query('SELECT * FROM membre'); 
    

    if($_POST) // si j'ai cliqué sur le bouton submit
    {
        

        if(!empty($_POST['email']))
        {

            // vérifier si l'email existe dans le champ "email" de la table membre
            

            // 1e étape : préparation de la requête
            $pdoStatement = $pdoObject->prepare('SELECT * FROM membre WHERE email = :email');
            // 2e étape : association du marqueur :email à sa valeur et son type
            $pdoStatement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            // 3e étape : exécution de la requête
            $pdoStatement->execute();

            $membreArray = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            
            //1e condition pour s'inscrire: vérifier que l'email n'existe pas en bdd : vérifier le tableau $membreArray
            if(empty($membreArray)) // si le tableau $membreArray est vide (email non existant) : 
            {
                
                    // 2e condition : si le mdp n'est pas vide 
                    if( !empty($_POST['mdp'])) 
                    {
                        
                        
                        // HASHAGE DU MOT DE PASSE
                        
                        $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                      
                 
                        // PREPARATION DE LA REQUETE 

                        // 1e étape : Préparation de la requête 
                        $pdoStatement = $pdoObject->prepare('INSERT INTO membre (pseudo,  mdp, nom, prenom, email, telephone, statut, civilite, date_enregistrement) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :telephone, :statut, :civilite, :date_enregistrement)');

                        // 2e étape : Association des marqueurs

                            foreach($_POST as $key => $value) 
                            {
  
                                    if(gettype($value) == "string")
                                    {
                                        $type = PDO::PARAM_STR;
                                    }
                                    else
                                    {
                                        $type = PDO::PARAM_INT;
                                    }
                                    
                                    $pdoStatement->bindValue(":$key", $value, $type);
                
                            }
     
                            $pdoStatement->bindValue(":statut" , $_POST['statut'], PDO::PARAM_INT);
                            $pdoStatement->bindValue(":date_enregistrement" ,date('Y-m-d H:i:s'), PDO::PARAM_STR);
                            $pdoStatement->bindValue(":civilite" , $_POST['civilite'] , PDO::PARAM_STR);

                        // 3e étape :

                        $pdoStatement->execute();
                        

                        // redirection sur la page connexion

                        header("Location:" . URL . "admin/gestionDesMembres.php?action=afficher");exit;

                        
                    }
                    else // else de la 2e condition : le mdp est vide
                    {
                        $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                                        Veuillez saisir un mot de passe
                                    </div>";
                    }
               
               
            }
            else // else de la 1e condition : l'email existe en bdd donc pas d'inscription possible avec cet email
            {
                $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                                L'email " . $_POST['email']  .  " est déjà associé à un compte
                            </div>";
            }

        }
        else // email VIDE
        {
            $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                            Veuillez saisir un email
                        </div>";
        }

    } 
    
    ?>
<h1 class="text-center m-4">Gestion des membres</h1>
<h3 class="text-center m-4">
    Quantité :
    <span class="badge badge-info">
        <?= $pdoStatement->rowCount() ?>
    </span>
</h3>
<a class="btn btn-primary m-2 p-2 float-right" href="<?= URL ?>admin/admin.php">Retour</a>
<!-- Ajouter un membre -->
<button class="btn btn-primary float-none" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Ajouter un membre
  </button>

  <div class="collapse" id="collapseExample">
  <form method="post"   class="m-5 mb-5 ">

    <section class="row g-2">

        <article class="col-md">

            <!-- pseudo -->
            <label for="pseudo" class="mt-4">Pseudo</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="pseudo"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" placeholder="pseudo"name="pseudo" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <!-- mdp -->
            <label for="mdp" class="mt-4">Mot de passe</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="mdp"><i class="fas fa-suitcase"></i></span>
                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <!-- nom -->
            <label for="nom" class="mt-4">Nom</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="nom" ><i class="fas fa-pen"></i></span>
                <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="Username" aria-describedby="addon-wrapping">
            </div>


            <!-- prenom -->
            <label for="prenom" class="mt-4">Prénom</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="prenom"><i class="fas fa-pen"></i></span>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

        </article>

        <article class="col-md">

            <!-- email -->
            <label for="email" class="mt-4">Email</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="email"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <!-- telephone -->
            <label for="telephone" class="mt-4">Telephone</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="telephone"><i class="fas fa-phone-square-alt"></i></span>
                <input type="number" class="form-control" name="telephone" placeholder="Telephone" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <!-- civilite -->
            <label for="civilite" class="mt-4">Civilite</label>
            <div class="input-group flex-nowrap">
                <select class="form-control" name="civilite" aria-label="Default select example">
                <option value="m" >Homme</option>
                <option value="f" >Femme</option>
                </select>
            </div>

            <!-- statut -->
            <label for="statut" class="mt-4">Statut</label>
            <div class="input-group flex-nowrap">
                <select class="form-control" name="statut" aria-label="Default select example">
                    <option value="1">Membre</option>
                    <option value="2">Admin</option>
                </select>
            </div>

        </article>

    </section>


    <div class="text-center mt-4 mb-6">
    <button class="btn btn-primary" type="submit">Ajouter</button>
  </div>
</form>
</div>




<table class="table">
    <thead>
        <tr>
            <th scope="col">id membre</th>
            <th scope="col">pseudo</th>
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">email</th>
            <th scope="col">telephone</th>
            <th scope="col">civilite</th>
            <th scope="col">statut</th>
            <th scope="col">date d'enregistrement</th>
            <th scope="col">actions</th>
        </tr>
    </thead>

    <tbody>
        
        
        <?php
            while($arrayMembre = $pdoStatement->fetch(PDO::FETCH_ASSOC)) : 
                
         ?>
            <tr>

            <th scope="row"><?= $arrayMembre['id_membre'] ?></th>
            <td><?= $arrayMembre['pseudo'] ?></td>
            <td><?= $arrayMembre['nom'] ?></td>
            <td><?= $arrayMembre['prenom'] ?></td>
            <td><?= $arrayMembre['email'] ?></td>
            <td><?= $arrayMembre['telephone'] ?></td>
            <td><?php 
            
            if( $arrayMembre['civilite'] =='f' ){
               echo 'Femme';
               
            }else{
               echo 'Homme';
            }
           
           ?></td>
            <td><?php 
            
             if( $arrayMembre['statut'] ==2 ){
                echo 'Admin';
                
             }else{
                echo 'Membre';
             }
            
            ?></td>
            <td><?= $arrayMembre['date_enregistrement'] ?></td>
            <td>
                <a href="<?= URL ?>admin/gestionDesMembres.php?action=voir&id_membre=<?= $arrayMembre['id_membre'] ?>" style="margin-right: 10px;">
                    <i class="fas fa-search-plus"></i>
                    </a>
                    <a href="<?= URL ?>admin/gestionDesMembres.php?action=modifier&id_membre=<?= $arrayMembre['id_membre'] ?>" style="margin-right: 10px;">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= URL ?>admin/gestionDesMembres.php?action=supprimer&id_membre=<?= $arrayMembre['id_membre'] ?>" onclick="return confirm('Confirmez-vous la suppression de ce membre ?')">
                    <i class="fas fa-trash-alt"></i>
                    </a></td>
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>




<?php
   
    include_once('../include/footer.php');
            endif; ?>

<!-- Afficher une fiche membre -->

<?php if(isset($_GET['action']) && ($_GET['action'] == "voir")) : 
    include_once('../include/header.php');
    $pdoStatement = $pdoObject->prepare('SELECT * FROM membre WHERE id_membre = :id_membre'); 
    $pdoStatement->bindValue(":id_membre", $_GET['id_membre'], PDO::PARAM_INT);
    $pdoStatement->execute();

    $arrayMembre = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement3 = $pdoObject->prepare('SELECT * FROM annonce WHERE membre_id = :membre_id'); 
    $pdoStatement3->bindValue(":membre_id", $_GET['id_membre'], PDO::PARAM_INT);
    $pdoStatement3->execute();

    

    
    $pdoStatement1 = $pdoObject->prepare('SELECT * FROM note WHERE membre_id2 = :id_membre'); 
    $pdoStatement1->bindValue(":id_membre", $_GET['id_membre'], PDO::PARAM_INT);
    $pdoStatement1->execute();
    
    $arrayMembreNote = $pdoStatement1->fetch(PDO::FETCH_ASSOC);


    $pdoStatement2 = $pdoObject->prepare('SELECT * FROM commentaire WHERE membre_id = :id_membre'); 
    $pdoStatement2->bindValue(":id_membre", $_GET['id_membre'], PDO::PARAM_INT);
    $pdoStatement2->execute();

    $arrayCommentaire = $pdoStatement2->fetch(PDO::FETCH_ASSOC);
    ?>



<a class="btn btn-primary m-2 p-2 float-right" href="<?= URL ?>admin/gestionDesMembres.php?action=afficher">Retour</a>

<h1 class="text-center m-4">Fiche Membre</h1>
<br>
<h3 class="text-center m-4">Membre inscrit le : <?php echo $arrayMembre['date_enregistrement'] ?> 


<br><br>
Id du membre : <?php echo $arrayMembre['id_membre'] ?>
<br><br>
Pseudo : <?php echo $arrayMembre['pseudo'] ?>
<br><br>
Nombre d'annonces : <?php echo $pdoStatement3->rowCount(); ?>
<br><br> Prénom : <?php echo $arrayMembre['prenom'] ?>
<br><br> Nom : <?php echo $arrayMembre['nom'] ?>
<br><br> Téléphone : <?php echo $arrayMembre['telephone'] ?>
<br><br> Email : <?php echo $arrayMembre['email'] ?>
<br><br> Civilité : <?php  if( $arrayMembre['civilite'] =='f' ){
               echo 'Femme';
               
            }else{
               echo 'Homme';
            }
            ?>
</h3>


<h3 class="text-center">Avis : </h3>
<?php while ($arrayMembreNote = $pdoStatement1->fetch(PDO::FETCH_ASSOC)) : ?>

    <br>
<p class="text-center text-primary"><?php echo $arrayMembreNote['avis'] ?></p>
<br>

<?php endwhile; ?>

<h3 class="text-center">Note : 

    <?php Note($arrayMembre['id_membre']) ?> <i class="fas fa-star" style="color: #FFD700"></i>
</h3>
<br><br><br>

<?php
   
   include_once('../include/footer.php');
           endif; ?>






<!-- Modifier un membre -->
<?php if(isset($_GET['action']) && ($_GET['action'] == "modifier")) : 
    include_once('../include/header.php');

    $pdoStatement = $pdoObject->prepare('SELECT * FROM membre WHERE id_membre=:id_membre');


    $pdoStatement->bindValue(":id_membre",  $_GET['id_membre'], PDO::PARAM_INT);
    $pdoStatement->execute();

    $arrayMembre = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    

    
    if($_POST) {
        $pdoStatement1 = $pdoObject->prepare('UPDATE membre SET statut = :statut WHERE id_membre=:id_membre');
        $pdoStatement1->bindValue(":id_membre",  $_GET['id_membre'], PDO::PARAM_INT);
        $pdoStatement1->bindValue(":statut",  $_POST['statut'], PDO::PARAM_INT);
        $pdoStatement1->execute();
        header('Location:' . URL . "admin/gestionDesMembres.php?action=afficher");
    }
    
    ?>
    <a class="btn btn-primary m-2 p-2 float-right" href="<?= URL ?>admin/gestionDesMembres.php?action=afficher">Retour</a>
<h1 class="text-center m-4">Modifier le membre: <?php echo $arrayMembre['prenom'] ?></h1>
<br>
<form method="post"   class="m-5 mb-5 " name="form_for_modification_membre">

    <section class="row g-2">

           <!-- statut -->
           <label for="statut" class="mt-4">Statut</label>
            <div class="input-group flex-nowrap">
                <select name="statut" class="form-control" aria-label="Default select example">
                    <option value="1">Membre</option>
                    <option value="2">Admin</option>
                </select>
            </div> 

    </section>



    <div class="text-center mt-4 mb-6">
    <button class="btn btn-primary" type="submit" name="modifier_membre">Modifier Membre</button>
  </div>
</form>





<?php
   
    include_once('../include/footer.php');
            endif; ?>












<!-- Fonction : SUPPRIMER un membre-->
<?php if(isset($_GET['action']) && ($_GET['action'] == "supprimer"))
    {

        if(isset($_GET['id_membre']))
        {
            
            
            $pdoStatement = $pdoObject->prepare('DELETE FROM membre WHERE id_membre = :id_membre');
            $pdoStatement->bindValue(":id_membre", $_GET['id_membre'] , PDO::PARAM_INT);
            $pdoStatement->execute();

            
            header('Location:' . URL . "admin/gestionDesMembres.php?action=afficher");
        }
        else
        {
            header('Location:' . URL . "erreur.php?page=inexistante");
        }



    }
    include_once('../include/footer.php');  ?>





