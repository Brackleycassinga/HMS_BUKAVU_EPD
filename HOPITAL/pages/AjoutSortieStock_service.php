<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='PHARMACIEN'){
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
				
				<?php require_once ("Ajout/menuPharmacie.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : SORTIE DE MEDICAMENTS</small> 
				  <img src="IMA/stockmed.png" width="150px" height="80px" /><img src="IMA/10.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ENREGISTREMENT DE LA LIVRAISON DES MEDICAMENTS AUX SERVICES
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-6"> 
										<label>Date de sortie en stock </label>
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
											
										<label>Sélectionnez le Service demandeur</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <select class="form-control" name="CodeService" style="width:580px;" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM Services");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['CodeService']."'>".$row['DesignService']."</option>";
													}
												}
												?>											
											</select>
                                        </div>	
										<label>Sélectionnez le Médicament livré</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <select class="form-control" name="IdMedicament" style="width:580px;" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM Medicaments");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['IdMedicament']."'>".$row['DesignMedicament']." ".$row['Dosage']."</option>";
													}
												}
												?>											
											</select>
                                        </div>
										<label>Quantité de médicament disponible au service</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="QteStock" placeholder="Quantité de médicament disponible au service" required >
                                        </div>
										<label>Quantité de médicament démandée</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="QteDemande" placeholder="Quantité de médicament démandée" required >
                                        </div>
                                    </div>
									<div class="col-lg-6">
										 
										<label>Quantité livrée</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="QteLivree" placeholder="Quantité de médicaments livrée au service demandeur" required >
                                        </div>
										<label>Prix unitaire de médicament livré</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="PrixUnit" placeholder="Prix unitaire de médicaments livré au service" required >
                                        </div>
										<label>Observation</label>
                                        <div class="form-group input-group">                                           
                                            <textarea class="form-control" name="Observation" placeholder="une phrase breuve" style="width:600px" ></textarea>
                                        </div>
																			
                                    </div>
									<div class="col-lg-12">
                                            <center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-save"></span> Enregistrer la livraison </button></center>                                   									
									</div>
								</form>
							</div>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		$Jour=$_POST['Jour'];
		$Mois=$_POST['Mois'];
		$Annee=$_POST['Annee'];
		$DateSortie = $Annee."-".$Mois."-".$Jour;

		$CodeService=$_POST['CodeService'];
		$IdMedicament=$_POST['IdMedicament'];
		$QteStock=$_POST['QteStock'];
		$QteDemande=$_POST['QteDemande'];
		$QteLivree=$_POST['QteLivree'];
		$PrixUnit=$_POST['PrixUnit'];
		$Observation=$_POST['Observation'];		
		$IdUtilisateur=$_SESSION['IdUtilisateur'];
		
		$rech=mysql_query("SELECT * FROM Medicaments WHERE IdMedicament='".$IdMedicament."'");
		$rs=mysql_fetch_array($rech);
		if($QteLivree <= $rs['StockExistant']){
			$req="INSERT INTO SortieMedServices VALUES('', '".$DateSortie."','".$QteStock."','".$QteDemande."','".$QteLivree."','".$PrixUnit."','".$IdMedicament."','".$CodeService."','".$Observation."','".$IdUtilisateur."' )";
			$result=mysql_query($req) or die(mysql_error());
				if (!$result){						
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement. <br>".mysql_error()."</div></div>";
				}
				else{ 
					$edit = "UPDATE  Medicaments SET  StockExistant =  StockExistant-".$QteLivree." WHERE IdMedicament ='".$IdMedicament."'";mysql_query($edit);
					echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> &nbsp; Enregistrement  de la livraison des médicaments effectué avec succès <br> Le stock du médicament a été diminué </div></div>";
				}
		}
		else{
			echo "<div class='col-lg-6'><div class='alert alert-success alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<span class='glyphicon glyphicon-remove'></span> &nbsp; Impossible d'effectuer la livraison de ce médicament car le stock existant est inférieur à la quantité livrée. </div></div>";
		}
	}
?>
						 
							</div>
                            <!-- /.row (nested) -->
                        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <!-- /#wrapper -->


	
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