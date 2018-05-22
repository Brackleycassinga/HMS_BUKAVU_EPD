<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MEDECIN' OR $_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEW HOPE HOSPITAL</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
	<link href="bootstrap/css/anim.css" rel="stylesheet" />
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<style>

</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php if ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')
							require_once ("Ajout/menu.php");
					  elseif ($_SESSION['Fonction']=='MEDECIN')
							require_once ("Ajout/menuMedecin.php");
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : SUPPRESSION DE SUIVI DES MALADES </small> 
				  <img src="IMA/11.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                           RECHERCHE DU MALADE CONCERNE PAR LE SUIVI
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade concerné par le suivi</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-danger" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM TourSalles, Hospitalisations, Patients, Services WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
												AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService 
												AND Patients.Idauto_Patient=TourSalles.Idauto_Patient") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>N°.</th>
																<th>DATE SUIVI</th>
																<th>HEURE </th>
																<th>CODE MALADE</th>
																<th>PHOTO </th>
																<th>NOMS DU MALADE</th>
																<th>SEXE</th>
																<th>SALLE</th>
																<th>LIT</th>
																<th>SERVICES</th>
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdTour'];?></td>
                                            <td><?php $DateTour = new DateTime($row['DateTour']);
													echo Date_Format($DateTour,'d-m-Y');
												?>
											</td>
                                            <td><?php echo $row['HeureTour'];?></td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['SalleHosp'];?></td>                                          
                                            <td><?php echo $row['NumLit'];?></td>                                          
                                            <td><?php echo $row['DesignService'];?></td>                                          
                                            <td><?php
													echo "<a href='SuppTourSalles.php?id=".$row['IdTour']."' title='Cliquez ici pour afficher les données du suivi'><span class='fa fa-list'></span> Afficher le détail</a>";	
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucun suivi trouvé dans la liste pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM TourSalles, Hospitalisations, Patients, Services WHERE TourSalles.IdTour='".$_GET['id']."' 
								AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService
								AND Patients.Idauto_Patient=TourSalles.Idauto_Patient") or die(mysql_error());
								while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
				<div class="panel panel-red">
					<div class="panel-body">
										
						<div class="col-lg-12">
							<center><h3> INFORMATIONS SUR L'HOSPITALISATION ET LE MALADE</h3></center>
							<br/>
						</div>					
						<div class="col-lg-4">					
							<label style="color:green;">Code et noms complets du Patient hospitalisé</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
							<label style="color:green;">Code de l'Hospitalisation</label>							
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="hidden" class="form-control" name="Idauto_Hosp" value="<?php echo $row['Idauto_Hosp']; ?>">
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo $row['CodeHosp']; ?>" readonly >
                            </div>
                            
                        </div>
						<div class="col-lg-4">
							<label style="color:green;">Salle et Num du lit de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" value="<?php echo $row['SalleHosp']; ?>" placeholder="Veuillez préciser la salle de l'hospitalisation" readonly >
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['NumLit']; ?>" placeholder="Veuillez préciser le numéro du lit" readonly>
                            </div>
							<label style="color:green;">Date de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </span>
									<?php $DateHosp = new DateTime($row['DateHosp']); $DateHosp = Date_Format($DateHosp,'d-m-Y');?>
								<input type="text" class="form-control" name="DateHosp" value="<?php echo $DateHosp; ?>" readonly>
                            </div>
                        </div>
						<div class="col-lg-4">							
							<label style="color:green;">Service de l'hospitalisation</label>
                           <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['DesignService']; ?>" placeholder="Veuillez préciser le numéro du lit" readonly>
                            </div>
							<label style="color:green;">Photo du Malade</label></br>
							<span><?php 	echo "<img  width=\"80\" height=\"80\" src=";
										echo '"Patients/';
										echo $row["Photo"];
											echo '"/>';
								?>
							</span>	
                        </div>
						<div class="col-lg-12">
							<hr style="border: solid 1px blue;">
							<center><h3>INFORMATIONS EN DETAIL DU SUIVI</h3></center>
								<br/>
						</div>
						<div class="col-lg-4">
							<input type="hidden" class="form-control" name="IdTour"  value="<?php echo $row['IdTour']; ?>" readonly >
							<div class="form-group"> 								
								<label>Date de suivi </label>	
								<?php $DateTour = new DateTime($row['DateTour']); $DateTour = Date_Format($DateTour,'d-m-Y');?>
								<input type="text" class="form-control" name="DateTour"  value="<?php echo $DateTour; ?>" placeholder="Date de suivi (jj-mm-aaaa)" readonly >
                            </div>
							<div class="form-group"> 								
								<label>Heure de suivi </label>	
								<input type="text" class="form-control" name="HeureTour"  value="<?php echo $row['HeureTour']; ?>" placeholder="Heure de suivi (hh:mm)" readonly >
                            </div>
							
							<label>Prescription faite de Médicaments</label>
                            <div class="form-group input-group"> 								                  
								<textarea class="form-control" name="Prescription" placeholder="Précisez les médicaments prescrits et le dosage" style="width:380px" readonly ><?php echo $row['Prescription']; ?></textarea>
                            </div>							
                        </div>
						
						<div class="col-lg-4">						
						<label>Les signes vitaux</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon">TA</span>                                         
								<input type="text" class="form-control" name="Ta" value="<?php echo $row['Ta']; ?>" placeholder="Tension artérière" readonly >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">PLS</span>                                           
								<input type="text" class="form-control" name="Pouls" value="<?php echo $row['Pouls']; ?>" placeholder="Pouls" readonly >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">Poids</span>                                           
								<input type="text" class="form-control" name="Poids" value="<?php echo $row['Poids']; ?>" placeholder="Poids en Kilogramme" readonly >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">FR</span>                                           
								<input type="text" class="form-control" name="FR" value="<?php echo $row['Fr']; ?>" placeholder="Fréquence Respiratoire" readonly >
                            </div>
							<div class="form-group input-group"> 	
								<span class="input-group-addon">FC</span>                                           
								<input type="text" class="form-control" name="FC" value="<?php echo $row['Fc']; ?>" placeholder="Fréquence Cardiaque" readonly >
                            </div>
							
						</div>
						<div class="col-lg-4">
							<label>Evolution de la santé</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Evolution" value="<?php echo $row['Evolution']; ?>" placeholder="Exemple: BIEN, ASSEZ BIEN, MAUVAIS, ..." readonly >
                            </div>
							<label>Observation faite</label>
                            <div class="form-group input-group"> 								                  
								<textarea class="form-control" name="Observation" placeholder="Parlez en bref de l'observation constatée" style="width:380px" readonly ><?php echo $row['Observation']; ?></textarea>
                            </div>
							
							<label>Médecin accompagnant</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span></span> </span>                                           
								<input type="text" class="form-control" name="Accompagnant" value="<?php echo $row['Accompagnant']; ?>" placeholder="Nom du Médecin accompagnant" readonly >
                            </div>
							<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
						</div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-danger" name="SuppTour" onclick="return confirm('Etes-vous certain de vouloir supprimer définitivement ce suivi?');"><span class="glyphicon glyphicon-trash"></span> Supprimer le suivi </button></center>
                        </div>										
					</div>					
				</div>										
			</form>
				
					<?php 
						} 
					}
					?>
			 
					</div>                           
                </div>
<?php
	if(isset($_POST['SuppTour'])){
		
		$IdTour=$_POST['IdTour'];
		$MotPasse=$_POST['MotPasse'];
		
			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$req="DELETE FROM TourSalles WHERE IdTour='".$IdTour."'";
				$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de suppression, <br/>".mysql_error()."</div></div>";
					}
					else{ 					
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> La suppression du suivi n° ".$_POST['IdTour']." du malade ".$_POST['Noms']." a été effectuée avec succès </div></div>";
					}
			}
			else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>Impossible de supprimer, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
			}
	}
?>				
			</div>
		</div>
    </div>


	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>