<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>Les Patients<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutPatients.php">Ajout des nouveaux patients</a></li>
					<li><a href="ModifPatients.php">Modifier un Patient</a></li>
					<li><a href="SuppPatients.php">Supprimer un Patient</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation <span class="caret"></span></a>
				<ul class="dropdown-menu">					
					<li><a href="ImprFicheMalades.php"> Imprimer Fiche de Malade </a></li>
					<li><a href="AfficheListeMalades.php"> Visualiser la liste de tous les Malades </a></li>
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