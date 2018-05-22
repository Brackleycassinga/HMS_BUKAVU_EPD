<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-envelope"></span> Facturation<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="rech_malade_facturation.php"> Facturer un malade</a></li>
					<li><a href="rech_facturation_edit.php"> Modifier une facturation</a></li>
					<li><a href="rech_facturation_delete.php"> Supprimer une facturation</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation des rapports<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="ImprFacture.php">Imprimer Facture pour un malade</a></li>
					<li><a href="affiche_situation_financiere_malades.php">Situation financière des malades</a></li>
					
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