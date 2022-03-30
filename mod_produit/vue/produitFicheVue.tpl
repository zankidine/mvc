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
                        <li class="active">{$titreVue}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
{*    MESSAGE RETOUR ERREUR *}
    <div {if ProduitTable::getMessageErreur() neq '' } class="alert alert-danger" {/if} >
        {ProduitTable::getMessageErreur()}
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong>{$titrePage}</strong></div>
                        <div class="card-body">
                            <form action="index.php" method="POST">
                                <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                                <input type="hidden" name="gestion" value="produit">
                                <input type="hidden" name="action" value="{$action}">
                                {if $action neq 'ajouter'}
                                    <div class="form-group">
                                        <label class="form-control-label">Référence Produit :</label>
                                        <input type="text" id="reference" name="reference" value="{$unProduit->getReference()}"  class="form-control" readonly>
                                    </div>
                                {/if}
                                <div class="form-group">
                                    <label for="designation" class=" form-control-label">Désignation</label>
                                    <input type="text" id="designation" name="designation" placeholder="La désignation du produit" value="{$unProduit->getDesignation()}" {$readonly} class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quantite" class=" form-control-label">Quantité</label>
                                    <input type="text" id="quantite" name="quantite" placeholder="Quantité" value="{$unProduit->getQuantite()}"  {$readonly} class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="descriptif" class=" form-control-label">Descriptif</label>
                                    <input type="text" id="descriptif" name="descriptif" placeholder="Descriptif produit" value="{$unProduit->getDescriptif()}" {$readonly}  class="form-control">
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="prix_unitaire_HT" class=" form-control-label">Prix Unitaire HT</label>
                                            <input type="text" id="prix_unitaire_HT" name="prix_unitaire_HT" placeholder="Prix unitaire HT" value="{$unProduit->getPrix_Unitaire_HT()}" {$readonly}  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="stock" class=" form-control-label">Stock</label>
                                            <input type="text" id="stock" name="stock" placeholder="Etat du stock" value="{$unProduit->getStock()}" {$readonly}  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="poids_piece" class=" form-control-label">Poids Piece</label>
                                            <input type="text" id="poids_piece" name="poids_piece" placeholder="Poids de la pièce" value="{$unProduit->getPoids_Piece()}" {$readonly}  class="form-control">
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
                           {*  Place pour les futurs boutons : Ajouter, Modifier, ou Supprimer*}
                               {if $action neq 'consulter'}
                                   <button class="btn btn-submit float-right"
                                           type="submit"
                                           name="btn_action">
                                       {$action|capitalize}
                                   </button>
                               {/if}
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
                                                <div class="stat-digit">{if $unProduit->getDescriptif() eq 'G'}{$unProduit->getPrix_Unitaire_HT()/($unProduit->getQuantite()/1000)}{elseif $unProduit->getDescriptif() eq 'P'}{$unProduit->getPrix_Unitaire_HT()/(($unProduit->getPoids_Piece() * $unProduit->getQuantite())/1000)}{/if}€</div>
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
                                                <div class="stat-text">L'article {$unProduit->getDesignation()} est classé en {$unProduit->getPosition()} {if $unProduit->getPosition() > 1}éme {else} ére{/if} position parmis les meilleurs ventes.</div>
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
