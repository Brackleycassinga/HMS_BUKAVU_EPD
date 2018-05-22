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
                 Gestion des Malades en ligne <small>  : MODIFICATION DES STOCKAGES </small> 
				 <img src="IMA/medicaments.png" width="120px" height="80px" /><img src="IMA/upcube.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            RECHERCHE ET MODIFICATION DES STOCKAGES
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>L'appellation du médicament stocké</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir une partie ou l'appellation 
											complète du médicament à rechercher dans la base de données.</p>
									</div>
										
								</div>
                             </div>
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Entreestocks, Medicaments, CategoriesMed WHERE (Medicaments.DesignMedicament LIKE '%$Mot%' AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed) AND Entreestocks.IdMedicament=Medicaments.IdMedicament") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) ENTREE(S) EN STOCK POUR \" $Mot \"</font></center>
														<br/>
													<table class='table'>														
														<thead>
															<tr>
																
																<th>DATE D'ENTREE</th>
																<th>DESIGNATION</th>																
																<th>DOSAGE</th>											
																<th>CATEGORIE</th>																
																<th>QTE ENTREE</th>																
																<th>PROVENANCE</th>																
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['DateEntree'];?></td>
                                            <td><?php echo $row['DesignMedicament'];?></td>                                          
                                            <td><?php echo $row['Dosage'];?></td>
                                            <td><?php echo $row['DesignCategorieMed'];?></td>                                          
                                            <td><?php echo $row['QteEntree'];?></td>                                          
                                            <td><?php echo $row['Provenance'];?></td>                                          
                                            <td><?php echo "<a href='ModifEntrees_stock.php?id=".$row['IdEntree']."' title='Modifier le stockage'><span class='glyphicon glyphicon-edit'></span> Modifier</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des entrées en stock pour le mot $Mot, vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Entreestocks, Medicaments, CategoriesMed WHERE Entreestocks.IdEntree='".$_GET['id']."' AND Entreestocks.IdMedicament=Medicaments.IdMedicament AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed");
						while($row=mysql_fetch_array($sql)){
					?>
					
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-6"> 
										<input type="hidden" class="form-control" name="IdEntree" value="<?php echo $row['IdEntree'];?>" readonly >
										<input type="hidden" class="form-control" name="IdMedicament" value="<?php echo $row['IdMedicament'];?>" readonly >
										
										<label>Désignation du médicament</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" value="<?php echo $row['DesignMedicament'] ." ". $row['Dosage'];?>" readonly >
                                        </div>
										
										<label>Date d'entrée en stock</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control" name="DateEntree" value="<?php echo $row['DateEntree'];?>"  readonly >
                                        </div>
										<label>Numéro de la facture</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="NumFacture" value="<?php echo $row['NumFacture'];?>" placeholder="Numéro de la facture" required >
                                        </div>
										<label>Numéro du lot</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="NumLot" value="<?php echo $row['NumLot'];?>" placeholder="Numéro du lot" required >
                                        </div>
										<label>Quantité entrée en stock</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="hidden" class="form-control" name="AncQteEntree" value="<?php echo $row['QteEntree'];?>">
                                            <input type="text" class="form-control" name="QteEntree" value="<?php echo $row['QteEntree'];?>" placeholder="Quantité entrée en stock" required >
                                        </div>
                                    </div>
									<div class="col-lg-6"> 
										<label>Prix Unitaire </label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="PrixUnit" value="<?php echo $row['PrixUnit'];?>" placeholder="Chiffre en dollars (sans le signe dollars)" required >
                                        </div>
										<label>Date de fabrication</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control" name="DateFabrication" value="<?php echo $row['DateFabrication'];?>" placeholder="Date de fabrication du médicament" required >
                                        </div>
										<label>Date de Péremption</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control" name="DateExpiration" value="<?php echo $row['DateExpiration'];?>" placeholder="Date de péremption du médicament" required >
                                        </div>
										<label>Provenance</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                            <input type="text" class="form-control" name="Provenance" value="<?php echo $row['Provenance'];?>" placeholder="Provenance du médicament stocké" required >
                                        </div>
										<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                            <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                                        </div>
                                    </div>
									<div class="col-lg-12">
                                            <center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications </button></center>                                   									
									</div>
								</form>
				
					<?php } }?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdEntree=$_POST['IdEntree'];
		$IdMedicament=$_POST['IdMedicament'];
		$NumFacture=$_POST['NumFacture'];
		$NumLot=$_POST['NumLot'];
		$AncQteEntree=$_POST['AncQteEntree'];
		$QteEntree=$_POST['QteEntree'];
		$PrixUnit=$_POST['PrixUnit'];
		$DateFabrication=$_POST['DateFabrication'];
		$DateExpiration=$_POST['DateExpiration'];
		$Provenance=$_POST['Provenance'];
		$MotPasse=$_POST['MotPasse'];

			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$sql=mysql_query("SELECT * FROM Medicaments WHERE IdMedicament='".$IdMedicament."'");
				$rech=mysql_fetch_array($sql);
				$Nvl=$rech['StockExistant'] - $AncQteEntree + $QteEntree;
				if($Nvl>0){
					$req="UPDATE Entreestocks SET NumFacture='".$NumFacture."', NumLot='".$NumLot."', QteEntree='".$QteEntree."',
						PrixUnit='".$PrixUnit."', DateFabrication='".$DateFabrication."', DateExpiration='".$DateExpiration."', Provenance='".$Provenance."' 
						WHERE IdEntree='".$IdEntree."'";			
					$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de modification. <br>".mysql_error()."</div></div>";
					}
					else{ 
						mysql_query("UPDATE Medicaments SET StockExistant='".$Nvl."' WHERE IdMedicament='".$IdMedicament."'");
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> &nbsp; Modification de l'entrée en stock effectuée avec succès. </div></div>";
					}
				}
				else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrer les modifications, car le stock deviendra négatif</div></div>";
				}
			}
			else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>Impossible de modifier, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
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