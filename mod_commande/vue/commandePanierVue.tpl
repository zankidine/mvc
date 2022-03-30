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
                                {foreach from=$listePanier key=index item=ligne}
                                    <tr>
                                        <td>{$index + 1}</td>
                                        <td>{$ligne.reference}</td>
                                        <td>{$ligne.designation}</td>
                                        <td>
                                            <form method="post" action="index.php">
                                            <input type="number" name="quantite" value="{$ligne.quantite}" style="width: 80px;">
                                        </td>
                                        <td>{$ligne.prix_unitaire_HT}</td>
                                        <td>
                                            <input type="number" name="prixVente" value="{$ligne.prixVente}" style="width: 100px;">
                                        </td>
                                        <td>{$ligne.quantite * $ligne.prixVente}</td>
                                        <td>

                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="modifierLigne">
                                                <input type="hidden" name="reference" value="{$ligne.reference}">
                                                <input type="image"
                                                       src="public/images/icones/p16.png"
                                                       name="btn_modifier">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="gestion" value="commande">
                                                <input type="hidden" name="action" value="supprimerLigne">
                                                <input type="hidden" name="reference" value="{$ligne.reference}">
                                                <input type="image"
                                                       src="public/images/icones/s16.png"
                                                       name="btn_supprimer">

                                            </form>
                                        </td>
                                    </tr>
                                {/foreach}
                                <tr>
                                    <td colspan="3"> Montant de la commande :<strong> {$analyse[0]['Montant']|string_format: "%.2f"} € </strong></td>
                                    <td colspan="3"> Total TVA : <strong>{$analyse[0]['TVA']|string_format: "%.2f"} € </strong></td>
                                    <td colspan="3" class="indication"> Marge brute : <strong>{$analyse[0]['Marge']|string_format: "%.2f"} € </strong></td>
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
