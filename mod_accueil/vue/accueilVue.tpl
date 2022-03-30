<!doctype html>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

<!-- Left Panel -->


<!-- PLACER LE Left Panel -->
{include file='public/left.tpl'}

<!-- FIN : Left Panel -->



<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <!-- PLACER LE  HEADER -->

    {include file='public/header.tpl'}

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
                                <span class="count">2008</span>
                            </h4>
                            <p class="text-light">CA Global est de : {$caGlobal} €</p>

                        </div>

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-2">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="count">2022</span>
                            </h4>
                            <p class="text-light">Nombre de clients total : {$nbrClient}</p>

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
                                <span class="count">2009</span>
                            </h4>
                            <p class="text-light">CA Global est de : 0 €</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card text-white bg-flat-color-4">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span class="">------</span>
                            </h4>
                            <p class="text-light">Moyenne de produits par commande :{$moyenne} produits</p>

                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <h4 class="mb-3">Le chiffre d'affaires des 8 meilleurs clients</h4>

                            <div id="clientTab" style="visibility:hidden; height:2px;">["{$listeMeilleursClients[0]['nom']}","{$listeMeilleursClients[1]['nom']}","{$listeMeilleursClients[2]['nom']}","{$listeMeilleursClients[3]['nom']}","{$listeMeilleursClients[4]['nom']}","{$listeMeilleursClients[5]['nom']}","{$listeMeilleursClients[6]['nom']}","{$listeMeilleursClients[7]['nom']}"]
                            </div>
                            <div id="caTab" style="visibility:hidden; height:2px;">["{$listeMeilleursClients[0]['CACLIENT']}","{$listeMeilleursClients[1]['CACLIENT']}","{$listeMeilleursClients[2]['CACLIENT']}","{$listeMeilleursClients[3]['CACLIENT']}","{$listeMeilleursClients[4]['CACLIENT']}","{$listeMeilleursClients[5]['CACLIENT']}","{$listeMeilleursClients[6]['CACLIENT']}","{$listeMeilleursClients[7]['CACLIENT']}"]</div>
                            <canvas id="barChart" style="display: block; width: 314px; height: 157px;" width="314" height="157"></canvas>

                        </div>
                    </div>


                </div><!-- /# column -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>

                            <h4 class="mb-3">Les produits en vedette</h4>

                            <div id="designationTab" style="visibility:hidden; height:2px;">["{$listeMeilleursProduits[0]['designation']}","{$listeMeilleursProduits[1]['designation']}","{$listeMeilleursProduits[2]['designation']}","{$listeMeilleursProduits[3]['designation']}","{$listeMeilleursProduits[4]['designation']}","{$listeMeilleursProduits[5]['designation']}","{$listeMeilleursProduits[6]['designation']}","{$listeMeilleursProduits[7]['designation']}"]</div>
                            <div id="qteTab" style="visibility:hidden; height:2px;">["{$listeMeilleursProduits[0]['NbrVente']}","{$listeMeilleursProduits[1]['NbrVente']}","{$listeMeilleursProduits[2]['NbrVente']}","{$listeMeilleursProduits[3]['NbrVente']}","{$listeMeilleursProduits[4]['NbrVente']}","{$listeMeilleursProduits[5]['NbrVente']}","{$listeMeilleursProduits[6]['NbrVente']}","{$listeMeilleursProduits[7]['NbrVente']}"]</div>
                            <canvas id="doughutChart" height="157" style="display: block; width: 314px; height: 157px;" width="314"></canvas>

                        </div>
                    </div>


                </div><!-- /# column -->
            </div>

        </div> <!-- .content -->
    </div>
</div><!-- /#right-panel -->


<script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>


<script src="public/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="public/assets/js/lib/chartGourmandise.js"></script>
<script src="public/assets/js/dashboard.js"></script>
<script src="public/assets/js/widgets.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="public/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script>
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
</script>

</body>
</html>

