<?php
    include_once('../include/init.php');
    
    if(!adminConnecte())
    {
        header("Location:" . URL . "erreur.php?acces=interdit"); exit;
    }





    include_once('../include/header.php');
?>


    <h1 class="text-center m-4">BACK OFFICE</h1>

    
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/gestionDesAnnonces.php?action=afficher">Gestion des Annonces</a>
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/gestionDesMembres.php?action=afficher">Gestion des Membres</a>
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/gestionDesCategories.php?action=afficher">Gestion des Catégories</a>
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/gestionDesCommentaires.php?action=afficher">Gestion des Commentaires</a>
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/gestionDesNotes.php?action=afficher">Gestion des Notes</a>
        <a class="btn btn-primary m-2 p-4" href="<?= URL ?>admin/statistiques.php?action=afficher">Statistiques</a>
   
    

<?php
    include_once('../include/footer.php');