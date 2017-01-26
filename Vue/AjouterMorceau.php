<!DOCTYPE html>
<html lang="fr">
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
                        <input id="search" name="barreRecherche" type="text" placeholder="Rechercher un titre" />
                        <input id="search" name="rechercher" type="submit" value="Rechercher" />
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- home banner ends -->



    <!-- blockblack -->
    <div class="blockblack">

        <!-- About Starts -->
        <div id="about" class="spacer">
            <h3><span class="glyphicon glyphicon-user"></span> Ajouter un morceau</h3>
            <div class="row">
                <div class="col-lg-5 col-sm-8  col-xs-12">
                    <?php
                    // si il y a une session qui existe alors l'utilisateur peut ajouter un titre sinon il doit se connecter
                        if(isset($_SESSION['login'])&&isset($_SESSION['mdp'])){
                            echo "<form method=\"post\" action=\"../index1.php?action=resultatAjout\" >
                                <input type=\"text\" name=\"titre\" placeholder=\"Titre\"/>
                                <br/><br/>
                                <input type=\"text\" name=\"\auteur\" placeholder=\"Auteur\"/>
                                <br/><br/>
                                <input type=\"text\" name=\"detail\" placeholder=\"Detail\"/>
                                <br/><br/>
                                <input type=\"text\" name=\"duree\" placeholder=\"Duree\"/>
                                <br/><br/>
                                <input type=\"text\" name=\"annee\" placeholder=\"Annee\"/>
                                <br/><br/>
                                <input name=\"chemin\"type=\"file\"/>
                                <br/><br/>
                                <input name=\"ajouter\"type=\"submit\" value=\"Ajouter\"/>
                                </form>";
                        }else{
                            echo "<p> Vous devez être connecté pour ajouter un morceau ! ";
                            echo "<form name=\"form1\" method=\"post\" action=\"../index1.php?action=connexion\">
                                 <input  type=\"submit\" value=\"Connexion\" />
                                 </form>";
                        }
                    ?>

                </div>

            </div>
        </div>
        <!-- About Ends -->

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















<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript" ></script>
<!-- boostrap -->
<script src="../assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
<script src="../assets/scripts/plugins.js" type="text/javascript"></script>
<script src="../assets/scripts/script.js" type="text/javascript"></script>

</body>
</html>

