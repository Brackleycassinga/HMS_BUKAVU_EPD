<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['Password'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']='CAISSIER'){
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
                 Gestion des Malades en ligne <small>  : LA CAISSE </small> 
				  <img src="IMA/im29.jpg" width="140px" height="80px"/><img src="IMA/browse.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            RECHERCHE ET MODIFICATION DES DECAISSEMENTS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Veuillez choisir ici le décaissement à modifier</label>
                                        <div class="form-group input-group">                                            
                                            <select class="form-control" name="IdSortie" required >
												<option value="">Sélectionnez ici </option>
												<?php
													require_once("BDD/connexion.php");
													$search=mysql_query("SELECT * FROM SortiesFonds");
														if (mysql_num_rows($search)>0){
															while($kap=mysql_fetch_row($search)){
																$Id=$kap[0];$Mon=$kap[2]; $Mot=$kap[4];
																$Da=$kap[1];$Ben=$kap[3];
																
																echo"<option value='$Id'>$Da | $Ben | $Mon | $Mot</option>";
															}
														}
												?>
											</select><span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
									
								</div>
								<div class="col-lg-6">
								
                             </div>
                           </div>
							

					<?php 
						if(isset($_POST['Rechercher'])){
							$IdSortie = $_POST['IdSortie'];
						require_once("BDD/connexion.php");
						$sql=mysql_query("SELECT * FROM SortiesFonds, Agents WHERE SortiesFonds.IdSortie='$IdSortie' AND SortiesFonds.IdAgent=AGENTS.IdAgent");
						if(mysql_num_rows($sql)>0){						
							while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="row">
						<div class="col-lg-6">
						<input type="text" class="hidden" name="IdS" value="<?php echo $row['IdSortie']; ?>">
												
						<label>Date de sortie en caisse (AAAA-MM-JJ)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <input type="text" class="form-control" name="DateSortie" value="<?php echo $row['DateSortie']; ?>" disabled>
                            </div>
							
                                <input type="text" class="hidden" name="Montant" value="<?php echo $row['MontantSortie']; ?>" required>
                         
							<label>Montant sortie en caisse (dollars)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                                <input type="text" class="form-control" name="MontantSortie" value="<?php echo $row['MontantSortie']; ?>" required>
                            </div>
							
							<label>Motif de la sortie de fonds</label>
                            <div class="form-group input-group">										
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span> </span>                                           
                                <input type="text" class="form-control" name="Motif" value="<?php echo $row['MotifSortie']; ?>" required >
                            </div>	
                        </div>
                        
						<div class="col-lg-6">										
											    
								
						<label>Agent ayant retiré de l'argent</label>
                            <div class="form-group input-group ">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> 
                                    <select class="form-control" name="IdAgent" required >
										<option value="<?php echo $row['IdAgent']; ?>"><?php echo $row['NomsAg']; ?></option>
											<?php
												require_once("BDD/connexion.php");
													$search=mysql_query("SELECT * FROM AGENTS");
														if (mysql_num_rows($search)>0){
															while($kap=mysql_fetch_row($search)){
																$Id=$kap[0];
																$Ap=$kap[2];
																echo"<option value='$Id'>$Ap </option>";
															}
														}
												?>
									</select>
                            </div>
							
						<label>Bénéficiaire du montant</label>
                            <div class="form-group input-group">										
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span> </span>                                           
                                <input type="text" class="form-control" name="Beneficiaire" value="<?php echo $row['Beneficiaire']; ?>" required >
                            </div>	
								<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-pencil"></span> Modifier le décaissement </button></center>							
						</div>
					</form>
				
					<?php 
							} 
						}
					}
					
					?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdS=$_POST['IdS'];
		$Montant =$_POST['Montant'];
		$MontantSortie=$_POST['MontantSortie'];
		$IdAgent = $_POST['IdAgent'];
		$Motif = $_POST['Motif'];
		$Beneficiaire = $_POST['Beneficiaire'];
		$DateNvl = date('current');
		$IdUtilisateur=$_SESSION['IdUtilisateur'];

			require_once("BDD/connexion.php");
			
			$rechSld=mysql_query("SELECT * FROM CAISSES");
			$AncSld=mysql_fetch_array($rechSld) or die(mysql_error());
			$Nvlsld=$AncSld['SoldeCaisse']+ $Montant - $MontantSortie;
			if($Nvlsld>0){
				$sld=mysql_query("UPDATE CAISSES SET SoldeCaisse='$Nvlsld'");
				$modE=mysql_query("UPDATE SortiesFonds SET MontantSortie='$MontantSortie', Beneficiaire='$Beneficiaire', MotifSortie='$Motif', IdAgent='$IdAgent', DernDateModS='$DateNvl', DernUserModS='$IdUtilisateur' WHERE SortiesFonds.IdSortie='$IdS'");
				
				echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-ok'></span> La sortie en caisse du montant de $Montant a été modifiée en montant de $MontantSortie</div></div>";
			}
			else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span> Echec de modification, car si vous modifiez ; le solde en caisse
								deviendra négatif. </div></div>";
			}
			
	}
?>
						 
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