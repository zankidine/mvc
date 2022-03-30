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
    <div {if CommandeTable::getMessageSucces() neq '' } class="alert alert-success" {/if} >
        {CommandeTable::getMessageSucces()}
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">
                    <form action="index.php" method="post" class="form-horizontal">
                        <input type="hidden" name="gestion" value="commande">
                        <input type="hidden" name="action" value="valider_commande">
                        <input type="hidden" name="vendeur" value="{$vendeur->getCodev()}">
                        <div class="row">
                            <div class=" col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">{$titrePage}</strong>
                                    </div>
                                    <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label" >Date de la commande</label></div>
                                                <div class="col col-sm-6"><input type="date" id="input-small" name="date_commande"  value="{$smarty.now|date_format: "%Y-%m-%d"}" class="input-sm form-control-sm form-control"></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Client</label></div>
                                                <div class="col col-sm-6">
                                                    <select name="client" id="client"  class="form-control" required>
                                                        <option value="">--- Choisir ---</option>
                                                        {foreach from=$listeClient item=client}
                                                            <option value="{$client->getCodec()}" >{$client->getNom()} - {$client->getCodec()} </option>
                                                        {/foreach}

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Vendeur</label></div>
                                                <div class="col col-sm-6"><p>{$vendeur->getPrenom()} {$vendeur->getNom()}</p></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Etat de la commande</strong>
                                    </div>
                                    <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Date de livraison</label></div>
                                                <div class="col col-sm-6">
                                                    <div class="row">
                                                        <div class="col col-sm-11">
                                                            <input type="date" id="input-small" name="date_livraison"
                                                                   value="{$smarty.now|date_format: "%Y-%m-%d"}"
                                                                   class="input-sm form-control-sm form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">Total HT (en €)</label></div>
                                                <div class="col col-sm-6">
                                                    <input type="text" id="input-small" name="montant" value="{$analyse[0]['Montant']|string_format: "%.2f"}" placeholder="" readonly class="input-sm form-control-sm form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5"><label for="input-large" class=" form-control-label">TVA (en €)</label></div>
                                                <div class="col col-sm-6"><input type="text" id="input-small" value="{$analyse[0]['TVA']|string_format: "%.2f"}" name="tva" readonly placeholder="" class="input-sm form-control-sm form-control"></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <th>Prix</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {foreach from=$listePanier key=index item=ligne}
                                        <tr>
                                            <td>{$index + 1}</td>
                                            <td>{$ligne.reference}</td>
                                            <td>{$ligne.designation}</td>
                                            <td>
                                                {$ligne.quantite}
                                            </td>
                                            <td>{$ligne.prixVente}</td>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>

                                <div class="card-body card-block">
                                    <div class="col-md-6"> <a href="index.php?gestion=commande"><input type="button" class="btn btn-submit" value="Retour" onclick=""></a> </div>
                                    <div class="col-md-6 ">
                                            <input type="submit" id="f_btn-action" class="btn btn-submit pos-btn-action" value="valider">
                                    </div>
                                    <br>
                                </div>

                        </div>
                    </form>
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
