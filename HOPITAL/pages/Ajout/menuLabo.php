<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>Catégories des examens<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutCategoriesExamens.php">Ajouter une catégorie</a></li>
					<li><a href="ModifCategoriesExamens.php">Modifier une catégorie</a></li>
					<li><a href="SuppCategoriesExamens.php">Supprimer une catégorie</a></li>
					<li><a href="ListeCategoriesExamens.php">Liste de toutes les catégories</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-book"></span> Les examens et Tests <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutExamens.php">Ajouter un examen dans la liste</a></li>
					<li><a href="ModifExamens.php">Modifier un examen</a></li>
					<li><a href="SuppExamens.php">Supprimer un examen</a></li>
					<li><a href="ListeExamens.php">Liste des examens</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-book"></span> Les Résultats des examens<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="rech_prescription_examens.php">Ajouter les resultats des examens</a></li>
					<li><a href="ModifResultatExamens.php">Modifier les resultats des examens</a></li>
					<li><a href="SuppResultatExamens.php">Supprimer les resultats des examens</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="Affich_resultat_examens_periode.php">Les resultats des examens d'une période</a></li>
					<li class="divider"></li>
					
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