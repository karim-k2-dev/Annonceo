<?php
    include_once('include/init.php');
    // recupere les annonces dans la base de donnees
    $arrayAnnonce = '';
    $pdoStatement = '';
    $add = '';
    $arrayTest[]= '';
    $pdoStatement3 = $pdoObject->query('SELECT * FROM categorie');
    $pdoStatement4 = $pdoObject->query('SELECT DISTINCT ville FROM annonce');
    $pdoStatement5 = $pdoObject->query('SELECT * FROM membre');
    $pdoStatement6 = $pdoObject->query('SELECT * FROM annonce');
    
    
    
    
    // si l'annonce n'existe pas

    if(isset($_GET['annonce']) && $_GET['annonce'] == "inexistant")
    {
        $erreur .= "<div class='col-md-6 mx-auto alert alert-danger text-center disparition'>
                        Annonce inexistante
                    </div>";
    }



    include_once('include/header.php');
    
?>
   
    <form method="post" action="" name="form_filtres">
    <br><br>
    <div class="row">
    <!-- Filtres de recherche -->
        <div class="col-sm-4 col-12"> 
            <label for="ordre">Trier</label>
        <select name="ordre" id="ordre" class="form-control col-sm-10" onchange="this.form.submit()">
                <option >Trier</option>
                <option value="prix_ascendant" >Du - cher au + cher</option>
                <option value="prix_descendant" >Du + cher au - cher</option>
                <option value="date_ascendant" >Du - ancien au + ancien</option>
                <option value="date_descendant" >Du + ancien au - ancien</option>
            </select>
            <!-- Categorie -->
            <label for="categorie">Catégorie</label>
            <select name="categorie" id="categorie" class="form-control col-sm-10" onchange="this.form.submit()">
                <option value="" disabled selected>Toutes les categories</option>
                <?php while($arrayCategorie = $pdoStatement3->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $arrayCategorie['id_categorie'] ?>"<?php if(isset($_POST['categorie']) && $_POST['categorie'] == $arrayCategorie['id_categorie'] ) echo "selected" ?>><?= $arrayCategorie['titre']  ?></option> 
                <?php endwhile; ?>
                
            </select>
            <!-- Region -->
            <label for="region">Région</label>
            <select name="region" id="region" class="form-control col-sm-10" onchange="this.form.submit()">
                <option value="" disabled selected>Toutes les régions</option>
                <?php while($arrayRegion = $pdoStatement4->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $arrayRegion['ville'] ?>"><?= $arrayRegion['ville']  ?></option> 
                <?php endwhile; ?>
            </select>
            <!-- Membre -->
            <label for="membre">Membre</label>
            <select name="membre" id="membre" class="form-control col-sm-10" onchange="this.form.submit()">
                <option value="" disabled selected>Tous les membres</option>
                <?php while($arrayMembre = $pdoStatement5->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?= $arrayMembre['id_membre'] ?>"><?= $arrayMembre['prenom']  ?></option> 
                <?php endwhile; ?>
            </select>
            <!-- Prix -->
            <div class="row">
                <div class="col-10">

            <label for="customRange3">Prix</label>
            <input type="range" name="prix" class="custom-range" min="0" max="10000" step="10" id="customRange3" onchange="this.form.submit()">
            <p>Prix: <span id="demo"></span> €</p>
            <p class="font-italic font-weight-light"> PS: maximum 10 000 €</p>
                </div>
            </div>
            <div class="row">
                <div class="col-10 d-flex justify-content-center">
                    <p class="font-italic font-weight-light" ><span id="demo1"></span> résultats</p>
                </div>
            </div>
        </div>
        <!-- Espacement -->
        <div class="col-sm-1"></div>
        <!-- Annonces -->
        
        <div class="col-sm-6 col-12">
            
        </form>
            
            
            <?= $erreur ?>

    <br><br>
    <!-- Affichage des annonces -->
    <?php 
    
    
    
    if($_POST)
    
{
    
        if(isset($_POST['categorie'])) 
        {
            $categorie = $_POST['categorie'];

            $sql[] = " categorie_id IN (" . $categorie .") ";
            
        }
        if(isset($_POST['region'])) 
        {
            $text = "'";
            $region = $_POST['region'];

            $sql[] = " ville IN (" . $text . $region . $text . ") ";
            
        }
        if(isset($_POST['membre'])) 
        {
            $membre = $_POST['membre'];

            $sql[] = " membre_id IN (" . $membre .") ";
            
        }
        if(isset($_POST['prix'])) 
        {
            $prix = $_POST['prix'];

            $sql[] = " prix < " . $prix ." ";
            
        }
     
        if(isset($_POST['ordre']) && $_POST['ordre'] == 'prix_ascendant') 
    {
        $add = 'ORDER BY prix ASC';

    }
        if(isset($_POST['ordre']) && $_POST['ordre'] == 'prix_descendant') 
    {
        $add = 'ORDER BY prix DESC';

    }
        if(isset($_POST['ordre']) && $_POST['ordre'] == 'date_ascendant') 
    {
        $add = 'ORDER BY date_enregistrement ASC';

    }
        if(isset($_POST['ordre']) && $_POST['ordre'] == 'date_descendant') 
    {
        $add = 'ORDER BY date_enregistrement ASC';

    }
    
}


        $pdoStatement = $pdoObject->query('SELECT * FROM annonce WHERE ' . implode(' AND ', $sql) . $add );
        ?>

        <div class="row justify-content-around">
        
            <?php
            while($arrayAnnonce = $pdoStatement->fetch(PDO::FETCH_ASSOC)) : 
                
                $pdoStatement2 = $pdoObject->prepare('SELECT prenom FROM membre WHERE id_membre = :id_membre');
                $pdoStatement2->bindValue(':id_membre', $arrayAnnonce['membre_id'], PDO::PARAM_INT);
                $pdoStatement2->execute();
                
                $arrayMembre = $pdoStatement2->fetch(PDO::FETCH_ASSOC);

                $pdoStatement21 = $pdoObject->prepare('SELECT * FROM photo WHERE id_photo = :id_photo');
                $pdoStatement21->bindValue(':id_photo', $arrayAnnonce['photo_id'], PDO::PARAM_INT);
                $pdoStatement21->execute();
                
                $arrayPhotos = $pdoStatement21->fetch(PDO::FETCH_ASSOC);
                
                
                
                ?>
                <div id="center">
                <div id="div_for_search">
                <a class="btn border-top border-bottom col-md-12 mt-1 mb-1" href="ficheAnnonce.php?id_annonce=<?= $arrayAnnonce['id_annonce'] ?>">
                <div class="row d-flex justify-content-center align-items-centercol-md-12 col-12 ">
                    <!-- Image -->
                    <div class="col-sm-6 align-self-center">
                    <?php if($arrayPhotos['photo1'] != "") :  ?>
                            <img class='img-fluid rounded' style='width:100px' src="images/imagesUpload/<?= $arrayPhotos['photo1'] ?>" alt="<?= $arrayAnnonce['titre'] ?>" title="<?= $arrayAnnonce['titre'] ?>">
                        <?php else :  ?>
                            <img class='img-fluid rounded' style='width:100px' src="images/default.jpg" alt="" title="Image par défaut">
                        <?php endif;  ?>
                    </div>

                    <!-- Description -->
                    <div class="col-sm-6">
                    <h6 class="m-2 text-primary text-left"><?= $arrayAnnonce['titre'] ?></h6>
                    <p class="text-left"><?= $arrayAnnonce['description_courte'] ?></p>

                       <div class="row">
                            <div class="col">
                                    <p class="text-left"><?= $arrayMembre['prenom'] ?>   <?php echo Note($arrayAnnonce['membre_id']) ?> <i class="fas fa-star" style="color: #FFD700"></i></p>
                            </div>
                            <div class="col">
                                <h6 class="m-2"><?= $arrayAnnonce['prix'] ?> €</h6>
                            </div>
                       </div> 
                    </div>
                    
                </div>
                </a>
                </div>
                </div>

            
            <?php endwhile;  
            
            ?>
        </div>
            <br><br>

    

   
        </div>
    </div>
    
    
<?php

   
    include_once('include/footer.php');
