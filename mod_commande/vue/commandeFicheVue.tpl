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
    <title>{$titreVue}</title>
    <meta name="description" content="{$titreVue}">
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file='public/header.tpl'}

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

    {*    MESSAGE RETOUR SUCCES *}
{*    <div {if ClientTable::getMessageSucces() neq '' } class="alert alert-success" {/if} >*}
{*        {ClientTable::getMessageSucces()}*}
{*    </div>*}

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Fiche Commande  : Enregistrement</strong>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Date de la commande</label></div>
                                            <div class="col col-sm-6"><input type="date" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Client</label></div>
                                            <div class="col col-sm-6">
                                                <select name="client" id="client"  class="form-control">
                                                    <option value="0">Please select</option>
                                                    <option value="1">Option #1</option>
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
                                            <div class="col col-sm-6"><input type="date" id="input-small" name="input-small" placeholder="" class="input-sm form-control-sm form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Total HT (en €)</label></div>
                                            <div class="col col-sm-6">
                                                <input type="text" id="input-small" name="input-small" placeholder="124.44" readonly class="input-sm form-control-sm form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-sm-5"><label for="input-large" class=" form-control-label">TVA (en €)</label></div>
                                            <div class="col col-sm-6"><input type="text" id="input-small" name="input-small" readonly placeholder="24.89" class="input-sm form-control-sm form-control"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{$titrePage}

                                <!-- PLACER LE FORMULAIRE D'AJOUT-->
                                {if $action !== 'modifier'}
                                    <form class="pos-ajout" action="index.php" method="post">
                                        <input type="hidden" name="gestion" value="commande">
                                        <input type="hidden" name="action" value="form_ajouter">
                                        <label>Ajouter une commande :
                                            <input type="image"
                                                   src="public/images/icones/a16.png"
                                                   name="btn_ajouter">
                                        </label>
                                    </form>
                                {/if}


                            </strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <!-- PLACER LA LISTE DES CLIENTS -->
                                <thead>
                                <tr>
                                    <th>N° de ligne</th>
                                    <th>Référence</th>
                                    <th>Désignation</th>
                                    <th>Quantite</th>
                                    <th>Prix</th>
                                    <th>Modifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1007</td>
                                    <td><a href="#">Tendre de fruit</a> </td>
                                    <td>
                                        <input type="number" value="3">
                                    </td>
                                    <td>24.48</td>

                                    <td class="pos-actions">
                                        <form method="post" action="index.php">
                                            <input type="hidden" name="gestion" value="commande">
                                            <input type="hidden" name="action" value="form_modifier">
                                            <input type="hidden" name="numero" value="">
                                            <input type="image"
                                                   src="public/images/icones/p16.png"
                                                   name="btn_modifier">
                                        </form>
                                    </td>

                                </tr>
{*                                {foreach from=$listeCommandes item=commande}*}
{*                                    <tr>*}
{*                                        <td>{$commande->getNumero()}</td>*}
{*                                        <td>{$commande->getVendeur()}</td>*}
{*                                        <td>{$commande->getClient()}</td>*}
{*                                        <td>{$commande->getTotal_Ht()}</td>*}
{*                                        <td class="pos-actions">*}
{*                                            <form method="post" action="index.php">*}
{*                                                <input type="hidden" name="gestion" value="commande">*}
{*                                                <input type="hidden" name="action" value="form_consulter">*}
{*                                                <input type="hidden" name="numero" value="{$commande->getNumero()}">*}
{*                                                <input type="image"*}
{*                                                       src="public/images/icones/m16.png"*}
{*                                                       name="btn_consulter">*}
{*                                            </form>*}
{*                                        </td>*}
{*                                        <td class="pos-actions">*}
{*                                            <form method="post" action="index.php">*}
{*                                                <input type="hidden" name="gestion" value="commande">*}
{*                                                <input type="hidden" name="action" value="form_modifier">*}
{*                                                <input type="hidden" name="numero" value="{$commande->getNumero()}">*}
{*                                                <input type="image"*}
{*                                                       src="public/images/icones/p16.png"*}
{*                                                       name="btn_modifier">*}
{*                                            </form>*}
{*                                        </td>*}
{*                                    </tr>*}
{*                                    {foreachelse}*}
{*                                    <tr>*}
{*                                        <td colspan="7">*}
{*                                            Aucun enregistrement trouvé*}
{*                                        </td>*}
{*                                    </tr>*}
{*                                {/foreach}*}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>
</html>
