<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-29 14:19:43
  from 'C:\laragon\www\mvc\mod_commande\vue\commandeFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6243157ff3d1d3_97227690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5de8dd936832b233b08fa66b1f31fa8c361babb5' => 
    array (
      0 => 'C:\\laragon\\www\\mvc\\mod_commande\\vue\\commandeFicheVue.tpl',
      1 => 1648563466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6243157ff3d1d3_97227690 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\laragon\\www\\mvc\\include\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
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

        <div <?php if (CommandeTable::getMessageSucces() != '') {?> class="alert alert-success" <?php }?> >
        <?php echo CommandeTable::getMessageSucces();?>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-small" class=" form-control-label" >Date de la commande</label></div>
                                            <div class="col col-sm-6"><input type="date" id="input-small" name="input-small" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['uneCommande']->value->getDate_Commande(),"%Y-%m-%d");?>
" class="input-sm form-control-sm form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Client</label></div>
                                            <div class="col col-sm-6">
                                                <select name="client" id="client" <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 class="form-control">
                                                    <option value="0">Please select</option>
                                                    <option value="1" <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
><?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getClient();?>
</option>
                                                    <option value="2">Option #2</option>
                                                    <option value="3">Option #3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Vendeur</label></div>
                                            <div class="col col-sm-6"><p>17 - Marc BAUDOT</p></div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Etat de la commande</strong>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Date de livraison</label></div>
                                            <div class="col col-sm-6">
                                                <div class="row">
                                                    <div class="col col-sm-11">
                                                        <input type="date" id="input-small" name="date_livraison"
                                                                <?php if ($_smarty_tpl->tpl_vars['action']->value !== 'modifier') {
echo $_smarty_tpl->tpl_vars['readonly']->value;
}?>
                                                               value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['uneCommande']->value->getDate_Livraison(),"%Y-%m-%d");?>
"
                                                               class="input-sm form-control-sm form-control">
                                                    </div>
                                                    <div>
                                                        <form method="post" action="index.php">
                                                            <input type="hidden" name="gestion" value="commande">
                                                            <input type="hidden" name="action" value="modifier_date">
                                                            <input type="hidden" name="numero" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                                            <input type="image"
                                                                   src="public/images/icones/p16.png"
                                                                   name="btn_modifier">
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Total HT (en ???)</label></div>
                                            <div class="col col-sm-6">
                                                <input type="text" id="input-small" name="input-small" placeholder="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_HT();?>
" readonly class="input-sm form-control-sm form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-large" class=" form-control-label">TVA (en ???)</label></div>
                                            <div class="col col-sm-6"><input type="text" id="input-small" name="input-small" readonly placeholder="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getTotal_Tva();?>
" class="input-sm form-control-sm form-control"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>


                                <!-- PLACER LE FORMULAIRE D'AJOUT-->
                                <?php if ($_smarty_tpl->tpl_vars['action']->value !== 'modifier') {?>
                                    <form class="pos-ajout" action="index.php" method="post">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="form_ajouter">
                                        <label>Ajouter une commande :
                                            <input type="image"
                                                   src="public/images/icones/a16.png"
                                                   name="btn_ajouter">
                                        </label>
                                    </form>
                                <?php }?>


                            </strong>
                        </div>
                        <div class="card-body">
                            <table id="" class="table table-striped">
                            <!-- PLACER LA LISTE DES CLIENTS -->
                                <thead>
                                <tr>
                                    <th>N?? de ligne</th>
                                    <th>R??f??rence</th>
                                    <th>D??signation</th>
                                    <th>Quantite</th>
                                    <th>Prix</th>
                                    <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uneCommande']->value->getListeLigneCommande(), 'ligne', false, 'index');
$_smarty_tpl->tpl_vars['ligne']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['ligne']->value) {
$_smarty_tpl->tpl_vars['ligne']->do_else = false;
?>
                                    <form method="post" action="index.php">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="modifier_ligne">
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['numero_ligne'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['reference'];?>
</td>
                                        <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['ligne']->value['designation'];?>
</a> </td>
                                        <td>
                                            <input type="number" name="quantite" class="text-center" <?php if ($_smarty_tpl->tpl_vars['action']->value !== 'modifier') {
echo $_smarty_tpl->tpl_vars['readonly']->value;
}?> value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['quantite_demandee'];?>
">
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['prix_unitaire_HT'];?>
</td>

                                        <td class="pos-actions">
                                                <input type="hidden" name="numero_ligne" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['numero_ligne'];?>
">
                                                <input type="hidden" name="reference_produit" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['reference'];?>
">
                                                <input type="hidden" name="numero_commande" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                                <input type="image"
                                                       src="public/images/icones/p16.png"
                                                       name="btn_modifier">
                                        </td>

                                    </tr>
                                    </form>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table>
                        </div>

                            <div class="card-body card-block">
                                <div class="col-md-4"> <a href="index.php?gestion=commande"><input type="button" class="btn btn-submit" value="Retour" onclick=""></a> </div>
                                <?php if ($_smarty_tpl->tpl_vars['action']->value == 'modifier') {?>
                                    <div class="col-md-4">
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="gestion" value="commande">
                                            <input type="hidden" name="action" value="annuler">
                                            <input type="hidden" name="f_numero" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                            <input type="submit" id="f_btn-action" class="btn btn-submit pos-btn-action" value="Annuler">
                                        </form>
                                    </div>
                                <div class="col-md-4 ">
                                    <form action="index.php" method="POST">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="finaliser">
                                        <input type="hidden" name="f_numero" value="<?php echo $_smarty_tpl->tpl_vars['uneCommande']->value->getNumero();?>
">
                                        <input type="submit" id="f_btn-action" class="btn btn-submit pos-btn-action" value="Finaliser">
                                    </form>
                                </div>
                                <?php }?>
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
