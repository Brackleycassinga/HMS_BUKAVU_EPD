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
                 Gestion des Malades en ligne <small>  :ENTREES EN STOCK</small> 
				  <img src="IMA/stockmed.png" width="150px" height="80px" /><img src="IMA/10.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ENREGISTREMENT DES ENTREES EN STOCK DES MEDICAMENTS
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-6"> 
										<label>Date d'entrée en stock</label>
                                       
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
										<label>Numéro de référence de la facture</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="NumFacture" placeholder="Numéro de la Facture accompagnant les médicaments" required >
                                        </div>
										<label>Numéro du lot</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="NumLot" placeholder="Numéro du Lot de Médicament" required >
                                        </div>
										<label>Quantité entrée en stock</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="QteEntree" placeholder="Quantité de médicaments entrée en stock" required >
                                        </div>
										<label>Prix unitaire de médicament stocké</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="PrixUnit" placeholder="Prix unitaire de médicaments entrée en stock" required >
                                        </div>
										
                                    </div>
									<div class="col-lg-6"> 
										<label>Date de Fabrication du médicament</label>
                                        <div class="form-group input-group">
											<table>                                          
												<tr><td><select class="form-control" name="JourFabr" required >
													<option value="">Jour</option>												
														<?php 
															for($i=1; $i<=31; $i++){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
												</select></td><td>
														
												<select class="form-control" name="MoisFabr" style="width:180px;">
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
														
												<select class="form-control" name="AnneeFabr" required >
													<option value="">Année</option>												
													<?php 
														for($i=date('Y'); $i>=1960; $i--){
															echo "<option value=".$i.">".$i."</option>";
														}
													?>
												</select></td></tr>
											</table>                                           
                                        </div>
										<label>Date de Péremption du médicament</label>
                                        <div class="form-group input-group">
											<table>                                          
												<tr><td><select class="form-control" name="JourExp" required >
													<option value="">Jour</option>												
														<?php 
															for($i=1; $i<=31; $i++){
																echo "<option value=".$i.">".$i."</option>";
															}
														?>
													</select></td><td>
															
													<select class="form-control" name="MoisExp" style="width:180px;">
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
													</select></td>
													<td><input type="text" class="form-control" name="AnneeExp" placeholder="Année" required ></td>
												</tr>
											</table>                                       
                                        </div>
										<label>Provenance de l'approvisionnement</label>
                                        <div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" class="form-control" name="Provenance" placeholder="Provenance de l'approvisionnement du médicament" required >                                            
                                        </div>
										
										<label>Sélectionnez le Médicament stocké</label>
										 <div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                            <select class="form-control" name="IdMedicament" required >
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
                                    </div>
									<div class="col-lg-12">
                                            <center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-ok"></span> Confirmer le stockage </button></center>                                   									
									</div>
								</form>
							</div>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		$Jour=$_POST['Jour'];
		$Mois=$_POST['Mois'];
		$Annee=$_POST['Annee'];
		$DateEntree = $Annee."-".$Mois."-".$Jour;
		$NumFacture=$_POST['NumFacture'];
		$NumLot=$_POST['NumLot'];
		$QteEntree=$_POST['QteEntree'];
		$PrixUnit=$_POST['PrixUnit'];
		$JourFabr=$_POST['JourFabr'];
		$MoisFabr=$_POST['MoisFabr'];
		$AnneeFabr=$_POST['AnneeFabr'];
		$DateFabrication = $AnneeFabr."-".$MoisFabr."-".$JourFabr;
		$JourExp=$_POST['JourExp'];
		$MoisExp=$_POST['MoisExp'];
		$AnneeExp=$_POST['AnneeExp'];
		$DateExpiration = $AnneeExp."-".$MoisExp."-".$JourExp;
		$Provenance=$_POST['Provenance'];		
		$IdMedicament=$_POST['IdMedicament'];
		$IdUtilisateur=$_SESSION['IdUtilisateur'];

		$req="INSERT INTO EntreeStocks VALUES('', '".$DateEntree."','".$NumFacture."','".$NumLot."','".$QteEntree."','".$PrixUnit."',
				'".$DateFabrication."','".$DateExpiration."','".$Provenance."','".$IdMedicament."','".$IdUtilisateur."' )";
		$result=mysql_query($req) or die(mysql_error());
			if (!$result){						
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrer cette entrée. <br>".mysql_error()."</div></div>";
			}
			else{ 
				$edit = "UPDATE  Medicaments SET  StockExistant =  StockExistant+".$QteEntree." WHERE IdMedicament ='".$IdMedicament."'";mysql_query($edit);
				echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-ok'></span> &nbsp; Enregistrement  du stockage effectué avec succès <br> Le stock du médicament a été ajouté </div></div>";
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