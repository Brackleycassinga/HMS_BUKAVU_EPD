<ul class="nav nav-tabs">
			<li><a href="Accueil.php" ><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"></span> Paiement de factures<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="rech_malade_payement.php">Ajouter un paiement effectué</a></li>
					<li><a href="rech_payement_edit.php">Modifier un paiement</a></li>
					<li><a href="rech_payement_delete.php">Supprimer un paiement</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-print"></span> Visualisation <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="affiche_situation_financiere_malades.php">Situation financière des malades</a></li>
					 <li class="divider"></li>
					<li><a href="ImprRecuPaiement.php">Imprimer réçu de payement</a></li>
					<li><a href="ImprBilletSortie.php">Imprimer billet de sortie</a></li>
					
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