<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Annonceo</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/spacelab/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <link rel="stylesheet" href="<?= URL ?>/include/css/style.php" type='text/css' media="all">
        <link rel="stylesheet" href="include/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-secondary">
        <a class="navbar-brand" href="<?= URL ?>index.php">Annonceo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link"  href="<?= URL ?>presentation.php">Qui Sommes Nous</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= URL ?>contact.php">Contact</a>
                </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-2">
                <input class="form-control mr-sm-2" type="text" name="search" id="input_for_search" placeholder="Recherche...">
            </form>
           
            <ul class="navbar-nav ml-auto mr-5">

                <!-- CLIENT CONNECTÉ -->
                <?php if(membreConnecte() && $_SESSION['membre']['statut'] == 1) : ?>

                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['membre']['prenom'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="<?= URL ?>profil.php?action=afficher">Profil</a>
                        <a class="nav-link" href="<?= URL ?>deposerUneAnnonce.php">Deposer Annonce</a>
                        <div class="dropdown-divider"></div>
                            <a class="nav-link" href="<?= URL ?>deconnexion.php">Déconnexion</a>
                        </div>
                    </li>

                <!--ADMIN CONNECTÉ -->
                <?php elseif(adminConnecte()) : ?>

                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="<?= URL ?>admin/admin.php">Back Office</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="nav-link" href="<?= URL ?>deconnexion.php">Déconnexion</a>
                        </div>
                    </li>

                <!-- ANONYMOUS  -->
                <?php else : ?>

                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="images/businessman.png" alt="" width="25px"> Espace Membre
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <!-- Button trigger modal -->
                        
                        <a  class="nav-link" role="button" data-toggle="modal" data-target="#exampleModal">
                        Inscription
                         </a>
                        <a  class="nav-link" role="button" data-toggle="modal" data-target="#exampleModal1">
                        Connexion
                         </a>

                        



                    </li>
                </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php
    include_once('include/init.php');
  

    // Sécurité
    // la page inscription est accessible seulement si un utilisateur n'est pas connecté
    if(membreConnecte())
    {
        header("Location:" . URL . "erreur.php?acces=interdit"); exit;
    }


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
     
                            $pdoStatement->bindValue(":statut" , 1, PDO::PARAM_STR);
                            $pdoStatement->bindValue(":date_enregistrement" ,date('Y-m-d H:i:s'), PDO::PARAM_STR);
                            $pdoStatement->bindValue(":civilite" , $_POST['civilite'] , PDO::PARAM_STR);

                        // 3e étape :

                        $pdoStatement->execute();
                        

                        // redirection sur la page connexion

                        header("Location:" . URL . "connexion.php?compte=enregistre");exit;

                        
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
            /* $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                            Veuillez saisir un email
                        </div>"; */
        }

    } 

  

?>


    
    <?= $erreur ?>
    <?= $notification ?>

    <form method="post" class="col-md-12 mx-auto bg-secondary">
        <h1 class="text-center m-4">S'inscrire</h1>
        <div class="form-group m-3 ">
            <label for="pseudo" ></label>
            <input type="text" class="form-control bg-white" id='pseudo' name="pseudo" placeholder="Votre pseudo">
        </div>

        <div class="form-group m-3">
            <label for="mdp"></label>
            <input type="text" class="form-control bg-white" id='mdp' name="mdp" placeholder="Votre mot de passe">
        </div>

        <div class="form-group m-3">
            <label for="nom"></label>
            <input type="text" class="form-control bg-white"id='nom' name="nom" placeholder="Votre nom">
        </div>

        <div class="form-group m-3">
            <label for="prenom"></label>
            <input type="text" class="form-control bg-white" id='prenom' name="prenom" placeholder="Votre prénom">
        </div>

        <div class="form-group m-3">
            <label for="email"></label>
            <input type="text" class="form-control bg-white" id='email' name="email" placeholder="Votre email">
        </div>

        <div class="form-group m-3">
            <label for="telephone"></label>
            <input type="text" class="form-control bg-white" id="telephone" name="telephone" placeholder="Votre Téléphone">
        </div>

        <div class="form-group m-3">
            <label for="civilite"></label>
            <select class="form-control bg-white" name="civilite" id="civilite"> 
                <option value="m" >Homme</option>
                <option value="f" >Femme</option>
            </select>
        </div>

        <div class="form-group m-3">
             <input type="submit" class="btn btn-primary col-md-12 mt-3 mb-5" value='Inscription'>
        </div>

        
    
    </form>





                            </div>
                            
                            </div>
                        </div>
                        </div>





<!-- Modal connexion-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
    include_once('include/init.php');
    // le code PHP du fichier se situera entre init et header

    // Sécurité
    // la page connexion est accessible seulement si un utilisateur n'est pas connecté
    if(membreConnecte())
    {
        header("Location:" . URL . "erreur.php?acces=interdit"); exit;
    }


    // s'il y a le paramètre "compte" dans l'url et que ce paramètre soit égal à "enregistre" : je rentre dans la condition
    if(isset($_GET['compte']) && ($_GET['compte'] == "enregistre"))
    {
        $notification .= "<div class='col-md-6 mx-auto alert alert-success text-center'>
                            Votre inscription a été enregistrée
                        </div>";
    }



    if(isset($_POST['connexion']) && $_POST['connexion'])

    {
        
        if(!empty($_POST['pseudo']))
        {
            
           // Vérification de l'existance du pseudo

            //1e étape 
            $pdoStatement = $pdoObject->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");

            // 2e étape 
            $pdoStatement->bindValue(":pseudo", $_POST['pseudo'], PDO::PARAM_STR);

            // 3e étape 
            $pdoStatement->execute();

            $membreArray = $pdoStatement->fetch(PDO::FETCH_ASSOC);
         


            // 1e condition pour la connexion : vérifier que l'email existe en bdd
            if(!empty($membreArray)) // si le tableau $membreArray n'est pas vide
            {
                // Comparer les mdp 
               
                if(password_verify($_POST['mdp'], $membreArray['mdp'])) 
                {
                    // pour être connecté, il faut rajouter le tableau $membreArray (c'est-à-dire les infos personnelles de l'utilisateur) dans un tableau qui se trouve dans la superglobale $_SESSION

                    foreach($membreArray as $key => $value)
                    {
                        $_SESSION['membre'][$key] = $value;
                    }

                    //client
                    if($_SESSION['membre']['statut'] == 1)
                    {
                        header("Location:" . URL . "profil.php?action=afficher");
                        echo "<meta http-equiv='refresh' content='0'>";
                        exit;
                    }
                    else //admin
                    {
                        header("Location:" . URL . "admin/admin.php");
                        echo "<meta http-equiv='refresh' content='0'>";
                        exit;
                    }


                    

                }
                else //  le mdp ne correspond pas
                {
                    $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                                    Mot de passe incorrect
                                </div>";
                }

            }
            else //pas de pseudo en bdd
            {
                $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                                L'email " . $_POST['pseudo']  .  " n'est pas associé à un compte <br>
                                Veuillez vous inscrire 
                            </div>";
            }

        }
        else //input pseudo VIDE
        {
            $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center'>
                            Veuillez saisir votre Pseudo
                        </div>";
        }
        
    } //
?>
   <?= $erreur ?>
    <?= $notification ?>

    <form method="post" class="col-md-12 mx-auto bg-secondary">
        <h1 class="text-center m-3 ">Se connecter</h1>
        <div class="form-group m-3 ">
            <label for="pseudo" ></label>
            <input type="text" class="form-control bg-white" id='pseudo' name="pseudo" placeholder="Votre pseudo">
        </div>

        <div class="form-group m-3">
            <label for="mdp"></label>
            <input type="text" class="form-control bg-white" id='mdp' name="mdp" placeholder="Votre mot de passe">
        </div>

        <div class="form-group m-3">
             <input type="submit" class="btn btn-primary col-md-12 mt-4 mb-5" name="connexion" value='Connexion'>
        </div>
    </form>

   

   

      </div>
      
    </div>
  </div>
</div>



            <?php endif; ?>
                
            </ul>
            
            
        </div>
    </nav>


    <div class="container">
