<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-23 11:04:31
  from 'C:\laragon\www\mvc\mod_accueil\vue\accueilVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_623afebfe31211_89346646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c79725f4ae4f4df86656f05e43a350f240d83d5' => 
    array (
      0 => 'C:\\laragon\\www\\mvc\\mod_accueil\\vue\\accueilVue.tpl',
      1 => 1648033470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_623afebfe31211_89346646 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOURMANDISE SARL</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>

<!-- Left Panel -->


<!-- PLACER LE Left Panel -->
<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->



<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <!-- PLACER LE  HEADER -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- FIN : header -->

    <!--<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="content mt-3">

        <br>

        <div class="animated fadeIn">
            <div class="row">


                <!-- PLACER LE TABLEAU DE BORD-->
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="count">2021</span>
                            </h4>
                            <p class="text-light">CA Global est de : 4523.32 €</p>

                        </div>

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-2">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="count">2022</span>
                            </h4>
                            <p class="text-light">Nombre de clients total de l'année en cours : 1200</p>


                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <div class="row">
                <!-- PLACER LE TABLEAU DE BORD-->
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-3">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="count">2022</span>
                            </h4>
                            <p class="text-light">CA Global est de : 523.32 €</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="">------</span>
                            </h4>
                            <p class="text-light">Moyenne de produits par commande : 12.45 produits</p>

                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <h4 class="mb-3">Single Bar Chart </h4>
                            <canvas id="singelBarChart" height="219" style="display: block; width: 439px; height: 219px;" width="439"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <h4 class="mb-3">Pie Chart </h4>
                            <canvas id="pieChart" height="439" style="display: block; width: 439px; height: 439px;" width="439"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
    </div>
</div><!-- /#right-panel -->


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
 src="public/assets/js/lib/chart-js/Chart.bundle.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/dashboard.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/widgets.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.sampledata.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/country/jquery.vmap.world.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
<?php echo '</script'; ?>
>

</body>
</html>

<?php }
}
