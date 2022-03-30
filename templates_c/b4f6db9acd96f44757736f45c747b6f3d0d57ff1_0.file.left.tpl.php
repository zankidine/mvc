<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-29 14:38:18
  from 'C:\laragon\www\mvc\public\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_624319daf3f753_37956341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4f6db9acd96f44757736f45c747b6f3d0d57ff1' => 
    array (
      0 => 'C:\\laragon\\www\\mvc\\public\\left.tpl',
      1 => 1648564677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_624319daf3f753_37956341 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <a href="left.tpl"></a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#A VOUS D'ECRIRE LE LIEN">Gourmandise SARL</a>
                <a class="navbar-brand hidden" href="#A VOUS D'ECRIRE LE LIEN">G</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                    </li>
                    <h3 class="menu-title">ADMINISTRATION</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?gestion=client">Liste</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=client&action=form_ajouter">Nouveau</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=client&action=archiver">Archives</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Produits</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="index.php?gestion=produit">Liste</a></li>
                            <li><i class="fa fa-table"></i><a href="index.php?gestion=produit&action=form_ajouter">Nouveau</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=produit&action=archiver">Archives</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?gestion=vendeur" > <i class="menu-icon fa fa-th"></i>Mon profil</a>
                        
                    </li>

                    <h3 class="menu-title">COMMANDES</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Historique</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="index.php?gestion=commande">Toutes les commandes</a></li>
                            <li><i class="fa fa-table"></i><a href="index.php?gestion=commande&action=nonValidee">Commandes non validé</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=commande&action=commande_annuler">Commandes annulées</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Passer une commande</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="index.php?gestion=commande&action=form_commande">Nouvelle commande</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="index.php?gestion=commande&action=vider_panier"> <i class="menu-icon fa fa-table"></i>Vider le panier en cours</a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel --><?php }
}
