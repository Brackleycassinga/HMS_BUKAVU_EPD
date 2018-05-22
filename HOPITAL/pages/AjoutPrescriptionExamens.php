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
                 Gestion des Malades en ligne <small>  : PRESCRIPTION DES EXAMENS / TESTS</small> 
				  <img src="IMA/doc_ok.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           PRESCRIPTION DES EXAMENS ET/OU TESTS A PASSER AU LABORATOIRE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
							<?php 
								if(isset($_GET['Nombre'])&& isset($_GET['Idauto_Patient'])){
									$Idauto_Patient=$_GET['Idauto_Patient']; $Nombre=$_GET['Nombre'];
									if($_GET['Nombre']>0){										
										require_once("BDD/connect.php");
										$sql=mysql_query("SELECT * FROM Patients WHERE Idauto_Patient='".$Idauto_Patient."'") or die(mysql_error());
										$row=mysql_fetch_array($sql);
							?>
					
									<form action="save_prescription_examens.php" method="GET" >
										<div class="col-lg-4">
											<input type="hidden" name="Nbre" value="<?php echo $_GET['Nombre']; ?>"></tr>										
										</div>					
										<div class="col-lg-4">					
											<label style="color:red;">Code et noms complets du Patient concerné</label>
											<div class="form-group input-group"> 
												<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
												<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
												<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
												<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
											</div>
											<label>Date de la prescription </label>
											<div class="form-group input-group">
												<table>                                          
													<tr><td><select class="form-control" name="Jour" required >
														<option value="">Jour</option>												
															<?php 
																for($i=1; $i<=31; $i++){
																	echo "<option value=".$i.">".$i."</option>";
																}
															?>
													</select></td><td>
															
													<select class="form-control" name="Mois" style="width:180px;">
														<option value="">Mois</option>
														<option value="01">Janvier</option>
														<option value="02">Fevrier</option>
														<option value="03">Mars</option>
														<option value="04">Avril</option>
														<option value="05">Mai</option>
														<option value="06">Juin</option>
														<option value="07">Juillet</option>
														<option value="08">Aout</option>
														<option value="09">Septembre</option>
														<option value="10">Octobre</option>
														<option value="11">Novembre</option>
														<option value="12">Decembre</option>
													</select></td><td>
															
													<select class="form-control" name="Annee" required >
														<option value="">Année</option>												
														<?php 
															for($i=date('Y'); $i>=2016; $i--){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select></td></tr>
												</table>                                           
											</div>
									<?php
										for ($i=1;$i<=$Nombre;$i++){
									?>									
											<label>Sélectionnez l'Examen ou Test N° <?php echo $i;?></label>
											<div class="form-group input-group"> 	
												<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span> </span>                                           
												<select class="form-control" name="IdExamen<?php echo $i; ?>"  required >
													<option value="">----Veuillez s&eacute;lectionner ici----</option>
													<?php
													require_once("BDD/Connect.php");
													$sel=mysql_query("SELECT * FROM Examens");
													if(mysql_num_rows($sel)>0){
														while($row=mysql_fetch_array($sel)){
															echo "<option value='".$row['IdExamen']."'>".$row['DesignExamen']."</option>";
														}
													}
													?>											
												</select>
											</div>
								<?php
										} 
									}
									else{
										header("location:rech_malade_prescription.php?id=".$Idauto_Patient."");
									}
								}
								else{
										header("location:rech_malade_prescription.php");
									}
								?>					
												
												<center><button type="submit" class="btn btn-success" name="EnregPrescription"><span class="glyphicon glyphicon-save"></span>Enregistrer la prescription d'examens </button></center>
										</div>										
									</div>					
								</div>										
							</form>				
					
			 
					</div>                           
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