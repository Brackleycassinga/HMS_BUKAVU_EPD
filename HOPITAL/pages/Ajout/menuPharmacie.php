<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"></span>Forme Galénique<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutCategoriesMedicaments.php">Ajouter une nouvelle Forme galénique</a></li>
					<li><a href="ModifCategoriesMedicaments.php">Modification des Formes galéniques</a></li>
					<li><a href="SuppCategoriesMedicaments.php">Suppression des Formes galéniques</a></li>
					<li><a href="ListeCategoriesMedicaments.php">Liste de toutes les Formes galéniques</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-medkit"></span> Médicaments<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutMedicaments.php">Ajouter de nouveaux Médicaments</a></li>
					<li><a href="ModifMedicaments.php">Modification des médicaments</a></li>
					<li><a href="SuppMedicaments.php">Suppression des médicaments</a></li>
					<li><a href="ListeMedicaments.php">Liste de tous les médicaments</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-plus-square"></span> Stockages<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutEntreesStock.php">Ajouter une entrée en stock</a></li>
					<li><a href="ModifEntrees_stock.php">Modification des entrées en stock</a></li>
					<li><a href="SuppEntrees_stock.php">Suppression des entrées en stock</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-minus-square"></span> Déstockages<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutSortieStock_service.php">Ajouter une sortie en stock pour le service</a></li>					
					<li><a href="rech_sortie_stock_service_edit.php">Modifier une sortie en stock pour le service</a></li>
					<li><a href="rech_sortie_stock_service_delete.php">Supprimer une sortie en stock pour le service</a></li>
					<li class="divider"></li>
					<li><a href="rech_prescription_medicaments.php">Ajouter une sortie en stock pour le Malade</a></li>
					<li><a href="rech_sortie_stock_malade_edit.php">Modifier une sortie en stock pour le Malade</a></li>
					<li><a href="rech_sortie_stock_malade_delete.php">Supprimer une sortie en stock pour le Malade</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AffichEntrees_stock_periode.php">Afficher les entrées en stock pour une période</a></li>
					<li><a href="AffichSorties_stock_periode.php">Afficher les sorties en stock pour une période</a></li>
					<li class="divider"></li>
					<li><a href="ListeMedicaments.php">Situation du stock</a></li>
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