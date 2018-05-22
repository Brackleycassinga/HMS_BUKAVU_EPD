<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='CAISSIER'){
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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>				
				<?php require_once ("Ajout/menuCaissier.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

<div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
	  
		<div class="row">
			<div class="col-lg-16">
				<h1 class="page-header" style="color:rgb(90, 100, 211);">
					 Gestion des Malades en ligne <small>  : PAYEMENT DES FACTURES MEDICALES </small> 
					  <img src="IMA/dep.jpg" width="120px" height="80px"/><img src="Image/im38.jpg" width="120px" height="80px"/>
				 </h1>
						<div class="panel panel-primary">
							<div class="panel-heading">
							   RECHERCHE DU MALADE CONCERNE PAR LA FACTURE A PAYER
							</div>
							<div class="panel-body">
								<div class="row">                                
									<div class="col-lg-6">
										<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
																					
											<label>Le Code ou Nom du Malade à facturer</label>
											<div class="form-group input-group">                                            
												<input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
												<span class="input-group-addon"><button type="submit" class="btn btn-primary" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
											</div>
										</form>
									</div>
								 <div class="col-lg-6">
									<div class="panel panel-primary">
										<div class="panel-body">
											<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
												nom du malade à rechercher dans la base de données.</p>
											<p style="color:red"><span class="fa fa-warning"></span> NB: Vous pouvez seulement enregistrer le payement d'un malade déjà facturé</p>
										</div>
									</div>
								 </div>
								</div>
							
								 <?php
									if(isset($_POST['Rechercher'])){
										$Mot=$_POST['Mot'];
										require_once("BDD/connect.php");
										
										$sqlSearch=mysql_query("SELECT * FROM  Facturations, Patients WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
											AND Patients.Etat='AUTORISATION SORTIE' AND Facturations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
										if (mysql_num_rows($sqlSearch)>0){										
											echo"<div class='col-lg-12'>                       
													<div class='panel-body'>
														<div class='table-responsive'>
														<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
															<br/>
														<table class='table'>
															
															<thead>
																<tr>
																	<th>DATE FACTURE</th>
																	<th>CODE DU MALADE</th>
																	<th>PHOTO </th>
																	<th>NOMS COMPLETS </th>
																	<th>SEXE</th>
																	<th>MONTANT FACTURE</th>
																	<th>DEJA PAYE</th>
																	<th>RESTE A PAYER</th>
																	<th>ACTION ENVISAGEE</th>																
																</tr>
															</thead>";
											while($row=mysql_fetch_array($sqlSearch)){
												
								 ?>				
												<tbody>
													<tr>
														<td><?php $DateFacturation=new DateTime($row['DateFacturation']); echo Date_Format($DateFacturation,'d-m-Y') ;?></td>
														<td><?php echo $row['CodePatient'];?></td>
														<td><?php echo "<img  width=\"80\" height=\"80\" src=";
																	echo '"Patients/';
																	echo $row["Photo"];
																	echo '"/>';?></td>
														<td><?php echo $row['Noms'];?></td>                                          
														<td><?php echo $row['Sexe'];?></td>   
														<td style="text-align:center;"><?php echo $row['MontantFacture'];?></td>
														<td style="text-align:center;"><?php $sel=mysql_query("SELECT Sum(MontantPaie) FROM Payements WHERE IdFacturation='".$row['IdFacturation']."'");
																  $mp=mysql_fetch_array($sel); if($mp[0]>0) $Montant = $mp[0]; else $Montant = 0;
																echo $Montant;
															?>
														</td>
														<td style="text-align:center;"><?php echo $row['MontantFacture']-$Montant ;?></td>														
														<td><?php 	if($Montant < $row['MontantFacture'])
																		echo "<a href='rech_malade_Payement.php?id=".$row['IdFacturation']."' title='Cliquez ici pour effectuer le paiement '><span class='fa fa-list'></span> Payer facture</a>";	
																	else
																		echo "<span style='color:blue;' class='glyphicon glyphicon-ok'> Totalité payée</span>";
															?>
																	
														</td>                                           
													</tr>                                      
												</tbody> 
								<?php
											}										
										}else{
											echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
													<span class='glyphicon glyphicon-remove'></span>
														Aucune facturation trouvée dans la liste pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
										}
									}
								?>
					<?php
						if(isset($_GET['id'])){
							$sql=mysql_query("SELECT * FROM Facturations, Patients WHERE IdFacturation='".$_GET['id']."' AND Facturations.Idauto_Patient=Patients.Idauto_Patient");
							if(mysql_num_rows($sql)>0){
								while($row=mysql_fetch_array($sql)){
					?>
									
										<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
											<input type="hidden" class="form-control" name="IdFacturation" value="<?php echo $_GET['id']; ?>">
											<div class="col-lg-4">
												<label>Code du Malade</label>
												<div class="form-group input-group"> 	
													<span class="input-group-addon"><span class="fa fa-file"></span></span>                                           
													<input type="hidden" class="form-control" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>" >
													<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly>
												</div>
												<label>Noms complets du Malade</label>
												<div class="form-group input-group"> 	
													<span class="input-group-addon"><span class="fa fa-user"></span></span>                                           
													<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<label>Montant de la facture</label>
												<div class="form-group input-group"> 	
													<span class="input-group-addon"><span class="fa fa-dollar"></span></span>                                           
													<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['MontantFacture']; ?>" readonly>
												</div>
												<label>Montant déjà payé et reste à payer</label>
												<div class="form-group input-group"> 	
													<span class="input-group-addon">Déjà payé <span class="glyphicon glyphicon-hand-right"></span></span>  
														<?php $sel=mysql_query("SELECT Sum(MontantPaie) FROM Payements WHERE IdFacturation='".$row['IdFacturation']."'");
															$mp=mysql_fetch_array($sel); if($mp[0]>0) $Montant = $mp[0]; else $Montant = 0;																
														?>
													<input type="text" class="form-control" name="MontantFacture" value="<?php echo $Montant; ?>" readonly>
													<span class="input-group-addon">Reste <span class="glyphicon glyphicon-hand-right"></span></span> 														
													<input type="text" class="form-control" name="Reste" value="<?php echo $row['MontantFacture']-$Montant; ?>" readonly>
												</div>
											</div>
											<div class="col-lg-4">
												<label>Montant payé</label>
												<div class="form-group input-group"> 	
													<span class="input-group-addon"><span class="fa fa-dollar"></span></span> 														
													<input type="text" class="form-control" name="MontantPaie" placeholder="Montant Payé par le malade" required>
												</div>
												<label>Observation</label>
												<div class="form-group input-group">						                                          
													<textarea class="form-control" name="Observation" style="width:400px" placeholder="Observation faite"></textarea>
												</div>
											</div>
											<div class="col-lg-12">
												<center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-save"></span> Sauvegarder le paiement</button></center>
											</div>
										</form>
					<?php 
								}				
							}				
						}				
					?>
			</div>	
				<?php
					if(isset($_POST['Enregistrer'])){						
						$Idauto_Patient=$_POST['Idauto_Patient'];
						$IdFacturation=$_POST['IdFacturation'];
						$DatePaie=date("Y-m-d");
						$MontantFacture=$_POST['MontantFacture'];
						$MontantPaie=$_POST['MontantPaie'];
						$Reste=$_POST['Reste'];
						$Observation=$_POST['Observation'];
						$IdUtilisateur=$_SESSION['IdUtilisateur'];
						
						require_once("BDD/connect.php");
						if($MontantPaie > 0){
							if($MontantPaie <= $Reste){	
								$req="INSERT INTO Payements VALUES('','".$DatePaie."','".$MontantPaie."','".$Observation."','".$IdFacturation."', '".$IdUtilisateur."')";
								$result=mysql_query($req) or die(mysql_error());
									if (!$result){
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement.<br/>".mysql_error()."</div></div>";
									}
									else{ 
										$sel=mysql_query("SELECT Sum(MontantPaie) FROM Payements WHERE IdFacturation='".$IdFacturation."'");
										$mp=mysql_fetch_array($sel); 
										if($mp[0]==$MontantFacture){
											mysql_query("UPDATE Patients SET Etat='SORTIE' WHERE Idauto_Patient='".$Idauto_Patient."'");
										}
										echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-ok'></span> Payement de la facture N° ".$IdFacturation." du malade ".$_POST['Noms']." a été effectué avec succès </div></div>";
									}
							}
							else{
								echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-remove'></span>Impossible d'enrgistrer ce payement, car le montant payé est supérieur au montant facturé.</div></div>";
							}
						}
						else{
								echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-remove'></span>Vous devez entrer un nombre supérieur à zero (0).</div></div>";
							}
					}
				?>			
		</div>
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