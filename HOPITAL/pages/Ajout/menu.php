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
			<?php 
				if ($_SESSION['Fonction']=='MD'){
			?>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-eye"></span> Consultations <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutConsultations.php" >Ajouter une consultation</a></li>
					<li><a href="ModifConsultations.php">Modifier une consultation</a></li>
					<li><a href="SuppConsultations.php">Supprimer une consultation</a></li>
					<li class="divider"></li>
					<li><a href="affichficheconsultation.php">Imprimer fiche de consultation</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-list"></span> Les Examens <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="rech_malade_prescription.php">Ajouter une Prescription</a></li>
					<li><a href="ModifPrescriptionExamens.php">Modifier une Prescription</a></li>
					<li><a href="SuppPrescriptionExamens.php">Supprimer une Prescription</a></li>
					<li class="divider"></li>
					<li><a href="AffichResultatsExamens.php">Afficher les resulats des examens / tests</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-list"></span> Médicaments <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="rech_malade_presc_medicaments.php">Prescrire les médicaments à un malade</a></li>
					<li><a href="ModifPrescriptionMedicaments.php">Modifier une pescription des médicaments</a></li>
					<li><a href="SuppPrescriptionMedicaments.php">Supprimer une Prescription des médicaments</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-university"></span> Hospitalisation <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutHospitalisation.php">Ajouter une hospitalisation</a></li>
					<li><a href="ModifHospitalisation.php">Modifier une hospitalisation</a></li>
					<li><a href="SuppHospitalisation.php">Supprimer une hospitalisation</a></li>
					<li class="divider"></li>
					<li><a href="AffichFicheHospitalisation.php">Fiche d'hospitalisation de malade</a></li>
				</ul>
			</li>
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-university"></span> Tour salles <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutTourSalles.php">Ajouter un suivi fait du Malade</a></li>
					<li><a href="ModifTourSalles.php">Modifier un suivi</a></li>
					<li><a href="SuppTourSalles.php">Supprimer un suivi</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-university"></span> Sorties<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AjoutAutorisationSorties.php">Autoriser une sortie de malade</a></li>
					<li><a href="ModifAutorisationSorties.php">Modifier une autorisation de sortie</a></li>
					<li><a href="SuppAutorisationSorties.php">Supprimer une autorisation de sortie</a></li>
				</ul>
			</li>
			<?php 
			}
			?>
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