<?php


    // ----- FONCTION MEMBRE CONNECTÉ 

   
    function membreConnecte()
    {
      
        if(isset($_SESSION['membre'])) // true
        {
            return true; 
        }
        else // false
        {
            return false; 
        }

    }
    
    // ----- FONCTION ADMIN CONNECTÉ


    function adminConnecte()
    {

        if(membreConnecte() && $_SESSION['membre']['statut'] == 2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    


    // ----- FONCTION Top 5 des membres les mieux notés

    
    function Note($inputMembreID)
    {   
        $i = 0;
        $arrayNotes = [];
        $pdoObject = new PDO('mysql:host=localhost; dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $pdoStatement = $pdoObject->prepare('SELECT note FROM note WHERE note IS NOT NULL AND membre_id2=:membre_id2 ');
        $pdoStatement->bindValue(":membre_id2",  $inputMembreID, PDO::PARAM_INT);
        $pdoStatement->execute();
        

        $arrayNote = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        while($i < count($arrayNote)) {
            array_push($arrayNotes, $arrayNote[$i]['note']);
            $i++;
        }
        if (count($arrayNotes)>0) {

            $resultatNote = @ array_sum($arrayNotes)/count($arrayNotes);
    
            $resultatarroundi = round($resultatNote, 1);
            if (is_nan($resultatarroundi)) {
                return;
            }else{
    
                return $resultatarroundi;
            }
        }else{
            return;
        }
        
        

    }
    // ----- FONCTION Top 5 des membres les plus actifs

    function Annonce($inputMembreID)
    {

        $i = 0;
        $arrayCategorie = [];
        $pdoObject = new PDO('mysql:host=localhost; dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $pdoStatement = $pdoObject->prepare('SELECT * FROM annonce WHERE membre_id=:membre_id ');
        $pdoStatement->bindValue(":membre_id",  $inputMembreID, PDO::PARAM_INT);
        $pdoStatement->execute();
        

        $resultatnombreAnnonces = $pdoStatement->rowCount();
        

        if (is_nan($resultatnombreAnnonces)) {
            return;
        }else{

            return $resultatnombreAnnonces;
        }
        
    }
   
    // ----- FONCTION Top 5 des catégories contenant le plus d’annonces


    function Categorie($inputCategorieID)
    {

        $pdoObject = new PDO('mysql:host=localhost; dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $pdoStatement = $pdoObject->prepare('SELECT * FROM annonce WHERE categorie_id=:categorie_id ');
        $pdoStatement->bindValue(":categorie_id",  $inputCategorieID, PDO::PARAM_INT);
        $pdoStatement->execute();
        

        $resultatCategorie = $pdoStatement->rowCount();
        

        if (is_nan($resultatCategorie)) {
            return;
        }else{

            return $resultatCategorie;
        }
        
    }
   







