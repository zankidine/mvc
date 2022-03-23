<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-22 15:28:30
  from 'C:\laragon\www\mvc\mod_produit\vue\produitFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6239eb1e9eae85_80262639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc7cc44c09819d05d0a19124af93fd0a440d8b84' => 
    array (
      0 => 'C:\\laragon\\www\\mvc\\mod_produit\\vue\\produitFicheVue.tpl',
      1 => 1647962907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6239eb1e9eae85_80262639 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\mvc\\include\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="public/favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="template/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>


<!-- Left Panel -->


<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- FIN : header -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>La gourmandise, ça se partage !</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=client">Clients</a></li>
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titreVue']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <div class="card-body">
                            <form action="index.php" method="POST">
                                <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                                <input type="hidden" name="gestion" value="produit">
                                <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
                                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                                    <div class="form-group">
                                        <label class="form-control-label">Référence Produit :</label>
                                        <input type="text" id="reference" name="reference" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getReference();?>
"  class="form-control" readonly>
                                    </div>
                                <?php }?>
                                <div class="form-group">
                                    <label for="designation" class=" form-control-label">Désignation</label>
                                    <input type="text" id="designation" name="designation" placeholder="La désignation du produit" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDesignation();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantite" class=" form-control-label">Quantité</label>
                                    <input type="text" id="quantite" name="quantite" placeholder="Quantité" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getQuantite();?>
"  <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="descriptif" class=" form-control-label">Descriptif</label>
                                    <input type="text" id="descriptif" name="descriptif" placeholder="Descriptif produit" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDescriptif();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
  class="form-control">
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="prix_unitaire_HT" class=" form-control-label">Prix Unitaire HT</label>
                                            <input type="text" id="prix_unitaire_HT" name="prix_unitaire_HT" placeholder="Prix unitaire HT" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPrix_Unitaire_HT();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="stock" class=" form-control-label">Stock</label>
                                            <input type="text" id="stock" name="stock" placeholder="Etat du stock" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getStock();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="poids_piece" class=" form-control-label">Poids Piece</label>
                                            <input type="text" id="poids_piece" name="poids_piece" placeholder="Poids de la pièce" value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPoids_Piece();?>
" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
  class="form-control">
                                        </div>
                                    </div>
                                </div>

                        <div class="card-body">

                            <div class="col-md-6">
                                <input class="btn btn-submit"
                                       type="button"
                                       name="btn_retour"
                                       value="Retour"
                                       onclick="location.href='index.php?gestion=produit'">
                            </div>

                            <div class="col-md-6">
                                                          <?php if ($_smarty_tpl->tpl_vars['action']->value != 'consulter') {?>
                                   <button class="btn btn-submit float-right"
                                           type="submit"
                                           name="btn_action">
                                       <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>

                                   </button>
                               <?php }?>
                            </div>
                        </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Statistique</strong></div>
                        <div class="card-body ">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-one">
                                            <div class="stat-content dib">
                                                <div class="stat-text">Prix au Kilogramme</div>
                                                <div class="stat-digit">36 €</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-one">
                                            <div class="stat-content dib">
                                                <div class="stat-text mb-1">Classement</div>
                                                <div class="stat-text">L'article DESIGNATION est classé en 1ère position parmis les meilleurs ventes.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/jszip.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/pdfmake.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/vfs_fonts.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.html5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.print.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.colVis.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables-init.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
