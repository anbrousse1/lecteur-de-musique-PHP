<?php
$mg=new ProjetPHP\Persistance\MorceauGateway();
$cg=new ProjetPHP\Persistance\CommentaireGateway();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Don't Stop The Music</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css" />
    <!-- boostrap -->
    <link rel="stylesheet" href="../assets/animate.css" type="text/css">
    <link rel="stylesheet" href="../assets/style.css">




</head>
<body>


<div id="fb-root"></div>



<!-- Header Starts -->
<div class="navbar-wrapper ">
    <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top animated fadeInDown" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="#home"><img src="../assets/images/logo.png" height="30" alt="logo"/></a>
                    <!-- #Logo Ends -->


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>


                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <ul  class="nav navbar-nav navbar-right" >
                        <!--Ci dessosu le codee pour les boutons qui renvoit sur les pages correspondante-->
                        <li>
                            <form name="form1" method="post" action="../index1.php">
                                <input type="submit" value="Accueil"  />
                            </form>
                        </li>
                        <li>
                            <form name="form1" method="post" action="../index1.php?action=afficherMorceaux">
                                <input  type="submit" value="Liste des morceaux" />
                            </form>
                        </li>
                        <span>
                            <li>
                                <form name="form1" method="post" action="../index1.php?action=ajout">
                                    <input  type="submit" value="Ajouter un morceau" />
                                </form>
                            </li>
                        </span>
                    </ul>

                    <?php
                    if(isset($_SESSION['login'])&&isset($_SESSION['mdp'])) {
                        echo "<form name=\"form1\" method=\"post\" action=\"../index1.php?action=deconnexion\">
                                <input  type=\"submit\" value=\"Déconnexion\" />
                                </form>";
                    }else {
                        echo "<form name=\"form1\" method=\"post\" action=\"../index1.php?action=connexion\">
                              <input  type=\"submit\" value=\"Connexion\" />
                              </form>";
                    }

                    ?>

                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>
</div>
<!-- #Header Starts -->







<!-- overlay -->
<div class="container overlay">


    <!-- home banner starts -->
    <div id="home" class="homeinfo">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="fronttext">
                    <h2 class=" textcolor animated fadeInUpBig"><span class="glyphicon glyphicon-headphones"></span> Don't Stop The Music</h2><br>
                    <p class=" animated fadeInUp">Le meilleure site de lecture de musique. </p>
                </div>
            </div>

            <div class="col-sm-5 col-xs-12 col-sm-offset-1">
                <div class="player">
                    <form action="../index1.php?action=rechercher"  method="post">
                        <input name="barreRecherche" type="text" placeholder="Rechercher un titre" />
                        <input name="rechercher" type="submit" value="Rechercher" />
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- home banner ends -->



    <!-- blockblack -->
    <div class="blockblack">

        <!-- Morceau -->
        <?php
        echo "<div id=\"Musique\" class=\"spacer\">";
            echo "<h3><span class=\"glyphicon glyphicon-user\"></span> Toute la musique ICI </h3>";
            echo "<div class=\"row\">";
            echo "<div class=\"col-lg-4 col-sm-4  col-xs-12\">";
            echo "</div>";
            echo "<div class=\"col-lg-5 col-sm-8  col-xs-12\">";
            echo "<p> Cliquer sur un titre pour avoir les détails :  </p></br>";
                    $tab=$mg->getAll();
                    foreach ($tab as $ligne){
                        echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#".$ligne->titre."\">".$ligne->titre."</a></br>";
                    }

            echo "</div>";
            echo "</div>";
            echo "</div>";
        ?>
        <!-- Morceau -->
    </div>


</div>
<!-- blockblack -->
</div>
<!-- overlay -->



<!-- Footer Starts -->
<div id="footer">
    <div class="container">
        Created by Anthony Brousse & Ivan Schmidt | Groupe 5
    </div>
</div>
<!-- # Footer Ends -->


<!-- background slider -->
<div id="myCarousel" class="carousel slide hidden-xs">
    <div class="carousel-inner">
        <div class="active item"><img src="../assets/images/back1.jpg" alt="" /></div>
        <div class="item"><img src="../assets/images/back2.jpg" alt="" /></div>
        <div class="item"><img src="../assets/images/back3.jpg" alt="" /></div>
        <div class="item"><img src="../assets/images/back4.jpg" alt="" /></div>
    </div>
</div>
<!-- background slider -->

<!-- Modal -->
<?php
    $tab=$mg->getAll();
    foreach ($tab as $ligne){
        echo "<div class=\"modal fade\"id=\"$ligne->titre\" tabindex=\"-1\" role=\"dialog\">";
        echo "<div class=\"modal-dialog\">";
        echo "<div class=\"modal-content\">";
        echo "=<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
        echo "<div id=\"blog\">";
        $res=$mg->getTitreByNom($dataError,$ligne->titre);
        echo "<h2>".$res->titre."</h2>";
        echo "<small>Posted on: ".$res->periodeMiseEnLigne."</small>";
        echo "<div class=\"col-lg-8 col-lg-offset-2\">";
                        if ($res->details==null){
                            echo "Pas d'information disponible";
                        }else {
                            echo "<p > ".$res->details."</p >";
                        }
                        echo "</div>";

        echo "<audio controls=\"controls\"preload=\"none\">
                            <source src="."\"".$res->chemin."\""."type=\"audio/mp3\" />
                            Votre navigateur n'est pas compatible
                        </audio>";
        echo "<p>Avis Favorable : ".$res->nbAvisFav." </p>
                    <p>Avis Défavorable : ".$res->nbAvisDeFav." </p>
                    <p>Avis Indifférent : ".$res->nbAvisIndif." </p>";
        echo "<p> Commentaires :</p>";

        //On regarde combien il y a de commentaire pour le morceau en question
        $tab=$cg->getNbCommentaire($dataError,$ligne->titre);
        foreach ($tab as $v){
            $nbCom=$v;
        }
        //Si il y a au moins un commentaire alors on affiche.
        if($nbCom!=0) {
            $com = $cg->getCommentaireByTitre($dataError, $ligne->titre);
            foreach ($com as $value) {
                echo $value->toHTML();
                echo "<form name=\"suppressionCommentaire\" method=\"post\" action=\"../index1.php?action=SuppressionCommentaire&id=".$value->id."\">";
                echo "<input type=\"submit\" name=\"supprimer\" value=\"supprimer\"/>";
                echo "</form>";
            }
        }

        echo "<form name=\"ajoutAvis\" method=\"post\" action=\"../index1.php?action=AjoutCommentaire&titre=".$res->titre."\">";
            echo "<input type='text' name=\"commentaire\" placeholder=\"Entrez votre commentaire\"/><br/>";
            echo "<select name=\"avis\">";
            echo "<option selected='selected' value=\"Indifferent\">Indifférent</option>";
            echo "<option value=\"Favorable\">Favorable</option>";
            echo "<option value=\"Defavorable\">Défavorable</option>";
            echo "</select>";
            echo "<input type=\"submit\" name=\"valider\" value=\"OK\"/>";
        echo "</form>";
        echo "</div>";
        echo"</div>";
        echo "</div>";
        echo "</div>";
    }

?>

<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript" ></script>
<!-- boostrap -->
<script src="../assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
<script src="../assets/scripts/plugins.js" type="text/javascript"></script>
<script src="../assets/scripts/script.js" type="text/javascript"></script>

</body>
</html>

