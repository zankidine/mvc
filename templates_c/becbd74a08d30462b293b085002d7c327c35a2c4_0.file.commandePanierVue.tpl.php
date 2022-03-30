<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-29 07:58:02
  from 'C:\laragon\www\mvc\mod_commande\vue\commandePanierVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6242bc0a40fa38_56814415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'becbd74a08d30462b293b085002d7c327c35a2c4' => 
    array (
      0 => 'C:\\laragon\\www\\mvc\\mod_commande\\vue\\commandePanierVue.tpl',
      1 => 1648540303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6242bc0a40fa38_56814415 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
                    <h1>Gourmandises ...</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li class="active"><a href="index.php?gestion=produit">Commandes</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="" class="table table-striped">
                            <!-- PLACER LA LISTE DES CLIENTS -->
                                <thead>
                                <tr>
                                    <th>N° de ligne</th>
                                    <th>Référence</th>
                                    <th>Désignation</th>
                                    <th>Quantite</th>
                                    <th>Prix HT</th>
                                    <th>Prix Vente</th>
                                    <th>Total</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePanier']->value, 'ligne', false, 'index');
$_smarty_tpl->tpl_vars['ligne']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['ligne']->value) {
$_smarty_tpl->tpl_vars['ligne']->do_else = false;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['reference'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['designation'];?>
</td>
                                        <td>
                                            <form method="post" action="index.php">
                                            <input type="number" name="quantite" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['quantite'];?>
" style="width: 80px;">
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['prix_unitaire_HT'];?>
</td>
                                        <td>
                                            <input type="number" name="prixVente" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['prixVente'];?>
" style="width: 100px;">
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['quantite']*$_smarty_tpl->tpl_vars['ligne']->value['prixVente'];?>
</td>
                                        <td>

                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="modifierLigne">
                                                <input type="hidden" name="reference" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['reference'];?>
">
                                                <input type="image"
                                                       src="public/images/icones/p16.png"
                                                       name="btn_modifier">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="supprimerLigne">
                                                <input type="hidden" name="reference" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['reference'];?>
">
                                                <input type="image"
                                                       src="public/images/icones/s16.png"
                                                       name="btn_supprimer">

                                            </form>
                                        </td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <tr>
                                    <td colspan="3"> Montant de la commande :<strong> <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['analyse']->value[0]['Montant']);?>
 € </strong></td>
                                    <td colspan="3"> Total TVA : <strong><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['analyse']->value[0]['TVA']);?>
 € </strong></td>
                                    <td colspan="3" class="indication"> Marge brute : <strong><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['analyse']->value[0]['Marge']);?>
 € </strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                            <div class="card-body card-block">
                                <div class="col-md-6"> <a href="index.php?gestion=commande&action=vider_panier"><input type="button" class="btn btn-submit" value="Retour à la commande" onclick=""></a> </div>
                                <div class="col-md-6 ">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="form_ajouter">
                                        <input type="hidden" name="numero" value="">
                                        <input type="submit" id="f_btn-action" class="btn btn-submit pos-btn-action" value="Sauvegarder">
                                    </form>

                                </div>
                                <br>
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
