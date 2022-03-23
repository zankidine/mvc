<?php

class Autoloader{

    public static function chargerClasses(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    public static function autoload($maClasse){
        // Supprime la majuscule du nom de la classe récupéré
        // et stocké dans $maClasse =>en minuscule pour correspondre avec
        // le nom du fichier
        $maClasse = lcfirst($maClasse);

        $repertoires = [
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_client/',
            'mod_client/controleur/',
            'mod_client/modele/',
            'mod_client/vue/',
            'mod_produit/',
            'mod_produit/controleur/',
            'mod_produit/modele/',
            'mod_produit/vue/',
            'mod_commande/',
            'mod_commande/controleur/',
            'mod_commande/modele/',
            'mod_commande/vue/',
            'mod_vendeur/',
            'mod_vendeur/controleur/',
            'mod_vendeur/modele/',
            'mod_vendeur/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/',
        ];

        foreach($repertoires as $repertoire){
            // vérifier si un fichier  $maClasse.php existe
            //Si oui on require_once !
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once($repertoire.$maClasse.'.php');
                return;
            }
        }
    }
}
