<!--
	Page de présentation des lieux cultes de la Guadeloupe
-->
<?php  
    // Titre de la page
    $title = "Présentation de la Guadeloupe - Ô'GÎTES";
  	// Ajout du header
	require_once 'head.php';
  	// Initialisation de la session
    session_start(); 
    // Navbar de la page de présentation
    header_page(2);
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <!-- Headline -->
        <h1><strong>DÉCOUVREZ NOTRE ARCHIPEL, LA GUADELOUPE</strong></h1>
    </div>
    <br><br>
    <div class="container">
        <!--<center>
            <!-- Image de présentation 
            <img id="main_img" src="https://www.auberge-impossible.com/wp-content/uploads/2018/02/guadeloupe-plage.jpg" alt="">
        <br><br>
        </center>-->
        <!-- Texte d'introduction de la guadeloupe -->
        <h5>
            Posée sur l’arc des Petites Antilles, la Guadeloupe est constituée en réalité d'un archipel de
		    sept îles. Karukera, comme on la nomme en amérindien, la partie principale, a la forme d’un papillon, à laquelle
		    sont adjointes les Saintes, Marie-Galante et la Désirade.
            <br><br>
		    C'est un archipel réputé magnifique grâce à ses plages luxuriantes, ses paysages à coupé le souffle et ses
		    habitants chaleureux. De nombreuses activités vous attendent pour découvrir cet archipel dans les moindres
		    détails : plongé, ballade à cheval ou en quad, accrobranche, randonnée...
            <br><br>
		    Il y en a pour tous les goûts !! Afin de vous accompagner au mieux nous avons regrouper ci dessous divers lieux
		    et activités qui n'attendent que vous.
        </h5>
        <br><br>
        <!-- Section des lieux phares -->
        <div id="lieux_phares">
            <h2><strong><i class="fa fa-map-marker"></i> <span class="section-title">Quelques lieux phares.</span></strong></h2>
            <div class="row">
                <div class="col-12 mt-3">
                    <style>
                        .card-horizontal {
                            display: flex;
                            flex: 1 1 auto;
                        }

                        .img-square-wrapper > img {
                            width: 400px;
                            height: 270px;
                            box-shadow: 5px 5px 5px lightgray;
                            border-radius: 3px;
                        }

                        #main_img {
                            box-shadow: 5px 5px 5px lightgray;
                            border-radius: 3px;
                        }

                        .section-title {
                            text-decoration: underline;
                            text-decoration-color: #27AE60;
			                text-decoration-style: solid;
                        }
                    </style>
                    <!-- Pointe des chateaux -->
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/pointe-des-chateaux.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><strong>La pointe des châteaux</strong></h4>
                                <p class="card-text">
                                    Célèbre pour ses paysages spectaculaires, la pointe des châteux est l’un des
                                    endroits les plus visités de la Guadeloupe.
                                    Visiter cet endroit est sans nul doute un incontournable lors d’un séjour
                                    sur notre île. À la pointe est de la Grande Terre, vous y découvrirez de grandes
                                    formations rocheuses créées par l’érosion où de grosses vagues s’échouent.
                                    Les différentes îles de la Guadeloupe y sont visibles (Petite Terre, Marie Galante 
                                    et parfois Les Saintes). Mais l’île la plus proche que vous ne pouvez pas manquer
                                    est La Désirade, à seulement 8 km de la pointe des Châteaux en Guadeloupe.
                                </p>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <!-- Chutes du carbet -->
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="card-body">
                                <h4 class="card-title"><strong>Les chutes du Carbet</strong></h4>
                                <p class="card-text">
                                Situées dans le parc national de la Guadeloupe, les trois chutes du Carbet sont
				                impressionnantes. Elles attirent, chaque année, des milliers de touristes, car elles ont un panorama à
				                couper le souffle. Pour les apercevoir, vous devez vous munir de bonnes chaussures de marche, car vous
				                devrez arpenter la forêt tropicale pour les trouver. Prenez une voiture de location pour vous rendre à
				                Capesterre-Belle-Eau afin de découvrir les 3 chutes du Carbet
                                </p>
                            </div>
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/carbet.jpg" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <!-- Réserve cousteau -->
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/cousteau.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><strong>La réserve Cousteau</strong></h4>
                                <p class="card-text">
                                Au large de la côte de Basse-Terre, près de Bouillante, les eaux entourant les îlets Pigeon comprennent
				                la célèbre Réserve Cousteau. On y trouve certains des plus beaux paysages aquatiques à voir en Guadeloupe.
				                Vous pourrez y faire de la plongée, le long des récifs en eaux peu profondes, de la plongée sous-marine,
				                ou observer le corail depuis un bateau à fond de verre. Les sites de plongée répondent à tous les
				                niveaux de plongeurs. Par ailleurs, les tortues, le poisson-perroquet, le poisson-trompette et le
				                barracuda fréquentent les jardins coralliens. Il est également possible de faire du kayak sur la réserve
				                au départ de l’île.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin lieux phares -->
        <br><br><br>
        <!-- Section plages populaires -->
        <div id="plage_populaire">
            <h2><strong><i class="fa fa-sun-o"></i> <span class="section-title"> <span class="section-title">Des plages incontournables.</span></strong></h2>
            <div class="row">
                <div class="col-12 mt-3">
                    <!-- Plage de sainte-anne -->
                    <div class="card">
                        <br>
                        <center>
                        <h4 class="card-title"><strong>La plage de Sainte-Anne</strong></h4>
                        </center>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/sa2.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br><br>
                                <p class="card-text">
                                Très fréquentée tant par les touristes que par les locaux, la plage du Bourg de Sainte Anne est la
					            plage communale où tout le monde vient se faire dorer et profiter des joies de la plage.
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="card-body">
                                <br><br><br><br>
                                <p class="card-text">
                                Avec son lagon et sa barrière de corail, la plage est magnifique, l’eau est chaude et d’une
					            incroyable clarté.
                                </p>
                            </div>
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/sa1.jpg" alt="Card image cap">
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/sa3.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br><br><br>
                                <p class="card-text">
                                Le marché qui se trouve juste derrière la plage et les petits restaurants qui bordent cette plage
					            apportent beaucoup d’animations.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Fin plage de sainte-anne -->
                    <br><br>
                    <!-- Plage de malendure -->
                    <div class="card">
                        <br>
                        <center>
                        <h4 class="card-title"><strong>La plage de Manlendure, Bouillante</strong></h4>
                        </center>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/malendure4.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br>
                                <p class="card-text">
                                La Plage de Malendure se situe au nord de Bouillante en face de l’îlet Pigeon qui offre un panorama
					            exceptionnel à cette plage. Son sable fin de type volcanique et de couleur foncée, sa pente douce et
					            ses vastes espaces font de cette plage un endroit idéal pour la détente. Des cocotiers offrent une ombre
					            agréable et fraîche pour pique-niquer ou se reposer.
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="card-body">
                                <br><br><br>
                                <p class="card-text">
                                Malendure est une des plages les plus populaires de Guadeloupe. La plage n’est protégée par aucun
					            récif corallien mais la baignade y est très agréable dans une eau chaude car la plage est orientée vers la
					            mer des Caraïbes, bien plus chaude et calme que l’océan.
                                </p>
                            </div>
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/malendure2.jpg" alt="Card image cap">
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/malendure3.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br><br>
                                <p class="card-text">
                                Elle est bien équipée et dispose de toutes les commodités : parking, douches, sanitaires,
					            restaurants, boutiques de souvenirs et de vêtements,
					            des payotes pour se rafraîchir avec des boissons typiques de la région.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Fin plage de malendure -->
                    <br><br>
                    <!-- Plage de la datcha -->
                    <div class="card">
                        <br>
                        <center>
                        <h4 class="card-title"><strong>La plage de la Datcha, Gosier</strong></h4>
                        </center>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/datcha2.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br><br>
                                <p class="card-text">
                                La jolie plage de la Datcha se situe en plein coeur du bourg de Gosier. Offrant une superbe vue sur
					            l’îlet Gosier, cette longue plage bénéficie d’un éclairage nocturne jusqu’à 23h.
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="card-body">
                                <br><br><br><br>
                                <p class="card-text">
                                Très fréquentée par les Gosériens, la plage de la Datcha est réputée pour son sable blanc et son eau
					            turquoise. Vous pourrez vous restaurer sur place dans l’un des deux restaurant surplombant la mer.
                                </p>
                            </div>
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/datcha1.jpg" alt="Card image cap">
                            </div>
                        </div>
                        <br>
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="images/presentation/datcha3.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <br><br><br><br>
                                <p class="card-text">
                                Possibilité de se garer sur le parking à quelques pas de la plage et de savourer quelques spécialités
					            antillaises ou boissons fraîches auprès des vendeurs bien souvent installés sur le parking.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Fin plage de la datcha -->
                </div>
            </div>
        </div>
        <!-- Fin plages poulaires -->
        <br><br><br>
        <!-- Section soufrière -->
        <div id="soufriere">
            <style>
                #main-soufriere {
                    width: 60%;
                    height: 60%;
                }
                #soufriere img {
                    box-shadow: 5px 5px 5px lightgray;
                    border-radius: 3px;
                }
                .img-soufriere {
                    width: 75%;
                    height: 75%;
                }
            </style>
            <h2><strong><i class="fa fa-photo"></i> <span class="section-title"> <span class="section-title">La Grande Soufrière.</span></strong></h2>
            <br>
            <center>
                <img id="main-soufriere" src="https://upload.wikimedia.org/wikipedia/commons/e/e9/Guadeloupe_114_-_Sommet_de_la_Soufri%C3%A8re_1467m_-_Guadeloupe.jpg" alt="">
            </center>
            <br><br>
            <h3><strong>Comment présenter la Guadeloupe sans parler de la Soufrière ?</strong></h3>
            <br>
            <h5>
                Situé dans le parc de la Guadeloupe, ne manquez pas une visite du plus haut sommet des Petites Antilles.
			    Surnommé aussi « la vieille Dame », le volcan de la soufrière est l’un des lieux les plus prestigieux du parc de la Guadeloupe.
                Son ascension est à la portée de tous. 
                <br><br>
                Ce volcan toujours en activité est actuellement en état de repos éruptif et est situé à Saint-Claude.
            </h5>
            <br>
            <center><img class="img-soufriere" src="images/presentation/vue.jpg" alt=""></center>
            <br>
            <h5>
                De bonnes chaussures sont à prévoir pour accéder au sommet, même si le parcours est dans l’ensemble
                facile, les 200 derniers mètres sont plus compliqués.
                On se retrouve sur des rochers glissants et une pente beaucoup plus accentuée. Prévoyez également des vivres, car le trajet aller-retour vous prendra
			    environ 5H.
            </h5>
            <br>
            <center><img src="images/presentation/vue3.jpg" alt="" class="img-soufriere"></center>
            <br>
            <h5>
                Pour visiter le volcan de la Soufrière, nul besoin de ticket d’entrée. La partie randonnée à pied est
				entièrement gratuite. Vous pouvez malgré tout prendre une visite guidée pour le volcan. De cette façon,
				vous pourrez profiter d’un guide expérimenté pour vous guider à travers la jungle tropicale qui orne les
				sentiers.
            </h5>
            <br>
            <center><img src="images/presentation/soufriere5.jpg" alt="" class="img-soufriere"></center>
            <br>
            <h5>
                Profitez également des Bains Jaunes ! Ce bassin a été idéalement aménagés au pied de la Soufrière, au
			    départ du Pas de Roy. De là, débute le sentier qui mène au volcan. ! Il a été construit, en pierres
			    volcaniques, par des soldats au XIXe siècle.
            </h5>
            <br>
            <center><img src="images/presentation/soufriere1.jpg" alt="" class="img-soufriere"></center>
            <br>
            <h5>
                C’est une véritable station thermale à ciel ouvert, qui, de
			    plus, est gratuite ! L’eau du bassin, même si elle est sulfureuse, n’est pas de couleur jaune, comme son
                nom le laisserait penser, mais d’un beau vert émeraude.
                Celui-ci est dû, en partie, à l’environnement
			    luxuriant qui l’entoure, et aussi, aux mousses accrochées au fond, qui rendent le sol assez glissant.
            </h5>
            <br>
            <center><img src="images/presentation/bain-jaune1.jpg" alt="" class="img-soufriere"></center>
            <br>
            <h5>
                L’eau, qui provient des entrailles de la Soufrière, s’est tout de même refroidie contre les parois
			    rocheuses. La température du bassin varie entre 26 et 28 degrés. Certains la considèrent comme une eau
			    salvatrice, un remède pour bien des maux, notamment, les douleurs musculaires.
			    Idéale après l'ascension de la Soufrière donc !
            </h5>
        </div>
        <!-- Fin souffrière -->
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>