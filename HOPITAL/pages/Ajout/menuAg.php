<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Utilisateurs <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutUsers.php" >Ajouter un nouvel utilisateur</a></li>
					<li><a href="BloquerAccesUtilisateurs.php">Bloquer / Autoriser l'accès d'un utilisateur</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-plus-square"></span> Services <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutServices.php" >Ajouter un nouveau service</a></li>
					<li><a href="ModifServices.php">Modifier un service</a></li>
					<li><a href="SuppServices.php">Supprimer un service</a></li>
					<li><a href="ListeServices.php">Liste de tous les services</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AfficheListeMalades.php"> Visualiser la liste de tous les Malades </a></li>
					<li class="divider"></li>
					<li><a href="affiche_situation_financiere_malades.php">Situation financière des malades</a></li>
					<li class="divider"></li>
					<li><a href="ListeMedicaments.php">Situation du stock de Médicaments</a></li>
					<li><a href="AffichEntrees_stock_periode.php">Afficher les entrées de Médicaments en stock</a></li>
					<li><a href="AffichSorties_stock_periode.php">Afficher les sorties de Médicaments en stock</a></li>
					<li class="divider"></li>
					<li><a href="Affich_statistique_periode.php">Statistiques générales pour une période</a></li>
				</ul>
			</li>
			
			<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['Noms'];?>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="EditUsers.php"><i class="fa fa-gear fa-fw"></i> Modifier votre mot de passe</a>
                        </li> 
						<li><a href="EditUsersPhoto.php"><i class="fa fa-photo fa-fw"></i> Modifier votre photo</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="Deconnect.php"><i class="fa fa-sign-out fa-fw"></i>Deconnexion</a>
                        </li>
                    </ul>
             </li>
</ul>