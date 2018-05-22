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
                 Gestion des Malades en ligne <small>  : SUPPRESSION DE SORTIE</small> 
				  <img src="IMA/del.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                           RECHERCHE DE L'AUTORISATION DE SORTIE A SUPPRIMER
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade déjà autorisé</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="un mot contenant le code ou nom du malade" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-danger" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-red">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
											nom du malade concerné par la sortie à supprimer.</p>
									</div>										
								</div>
                             </div>
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Sorties, Hospitalisations, Patients, Services WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
										AND Patients.Etat='AUTORISATION SORTIE' AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient 
										AND Hospitalisations.Idauto_Hosp=Sorties.Idauto_Hosp AND Hospitalisations.CodeService=Services.CodeService") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE DE SORTIE</th>
																<th>CODE</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS </th>
																<th>SEXE</th>																
																<th>DATE HOSPIT.</th>
																<th>SALLE / LIT</th>
																<th>SERVICE</th>
																<th>ACTION ENVISAGEE</th>																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>				
											<tbody>
												<tr>
													<td><?php $DateSortie=new DateTime($row['DateSortie']); echo Date_Format($DateSortie,'d-m-Y') ;?></td>
													<td><?php echo $row['CodePatient'];?></td>
													<td><?php echo "<img  width=\"80\" height=\"80\" src=";
																echo '"Patients/';
																echo $row["Photo"];
																echo '"/>';?></td>
													<td><?php echo $row['Noms'];?></td>                                          
													<td><?php echo $row['Sexe'];?></td>                                          
													<td><?php $DateHosp=new DateTime($row['DateHosp']); echo Date_Format($DateHosp,'d-m-Y') ;?></td>                                          
													<td><?php echo "".$row['SalleHosp']."/".$row['NumLit']."";?></td>                                          
													<td><?php echo $row['DesignService'];?></td>													
													<td><?php echo "<a href='SuppAutorisationSorties.php?id=".$row['IdSortie']."' title='Cliquez ici pour afficher les détails'><span class='fa fa-list'></span> Afficher</a>";	?>
													</td>                                           
												</tr>                                      
											</tbody> 
							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des sorties pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM Sorties, Hospitalisations, Patients, Services WHERE Sorties.IdSortie='".$_GET['id']."' AND Hospitalisations.Idauto_Hosp=Sorties.Idauto_Hosp
									AND Patients.Etat='AUTORISATION SORTIE' AND Hospitalisations.Idauto_Patient=Patients.Idauto_Patient AND Hospitalisations.CodeService=Services.CodeService");
								while($row=mysql_fetch_array($sql)){
					?>
					
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
				<div class="panel panel-primary">
					<div class="panel-body">
										
						<div class="col-lg-4">					
							<label style="color:red;">Code du Patient </label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
                            </div>
							<label style="color:red;">Noms complets du Patient </label>
                            <div class="form-group input-group">								
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
													
                        </div>
						
						<div class="col-lg-4">					
							<label>Code de l'Hospitalisation</label>							
                            <div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                <input type="hidden" class="form-control" name="Idauto_Hosp" value="<?php echo $row['Idauto_Hosp'];?>" readonly >
                                <input type="text" class="form-control" name="CodeHosp" value="<?php echo $row['CodeHosp'];?>" readonly >
                            </div>	
							<label>Date de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span> </span>
									<?php $DateHosp=new DateTime($row['DateHosp']); $DateHosp=Date_Format($DateHosp,'d-m-Y') ;?>
								<input type="text" class="form-control" name="DateHosp" value="<?php echo $DateHosp; ?>" readonly>
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<label>Salle de l'hospitalisation</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span> </span>                                           
								<input type="text" class="form-control" name="Salle" value="<?php echo $row['SalleHosp'];?>" readonly >
                            </div>
							<label>Numéro du lit</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>                                           
								<input type="text" class="form-control" name="NumLit" value="<?php echo $row['NumLit'];?>" readonly>
                            </div>							
                        </div>
						<div class="col-lg-12">
							<hr style="border:solid 1px blue;">
						</div>
						<div class="col-lg-3">
						</div>
						<div class="col-lg-6">
							<input type="hidden" class="form-control" name="IdSortie" value="<?php echo $row['IdSortie'];?>" readonly>
							<label>Date de sortie</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<?php $DateSortie=new DateTime($row['DateSortie']); $DateSortie=Date_Format($DateSortie,'d-m-Y') ;?>
								<input type="text" class="form-control" name="DateSortie" value="<?php echo $DateSortie;?>" readonly>
                            </div>
							<label>Etat de sortie</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"> </span>                                           
								<input type="text" class="form-control" name="Etat" value="<?php echo $row['EtatSortie'];?>" readonly>
                            </div>
							<label>Observation</label>
                            <div class="form-group input-group">						                                          
								<textarea class="form-control" name="Observation" style="width:590px" readonly><?php echo $row['Observation'];?></textarea>
                            </div>
							<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
						</div>
						<div class="col-lg-12">
								<center><button type="submit" class="btn btn-danger" name="SuppSortie" onclick="return confirm('Voulez-vous vraiment supprimer cette autorisation de sortie?');"><span class="glyphicon glyphicon-trash"></span> Supprimer l'autorisation de sortie</button></center>
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
	if(isset($_POST['SuppSortie'])){
		
		$IdSortie=$_POST['IdSortie'];
		$Idauto_Patient=$_POST['Idauto_Patient'];
		$MotPasse=$_POST['MotPasse'];
		
		require_once("BDD/connect.php");
		$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
		if(mysql_num_rows($rqt)>0){
			$sel=mysql_query("SELECT * FROM Facturations WHERE Idauto_Patient='".$Idauto_Patient."'");
				if(mysql_num_rows($sel)==0){
					$req="DELETE FROM Sorties WHERE IdSortie='".$IdSortie."'";
					$result=mysql_query($req) or die(mysql_error());
						if (!$result){
							echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-remove'></span>Echec de suppression <br/>".mysql_error()."</div></div>";
						}
						else{						
							mysql_query("UPDATE Patients SET Etat='HOSPITALISE' WHERE Idauto_Patient='".$Idauto_Patient."'");
							echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-ok'></span> L'autorisation de sortie du malade ".$_POST['Noms']." a été supprimée avec succès </div></div>";
						}
				}
				else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> Impossible de supprimer l'autorisation de sortie du Malade ".$_POST['Noms'].", <br/> Car il est déjà facturé. 
							Pour le Suppimer, veuillez annuler aussi la facturation. </div></div>";
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