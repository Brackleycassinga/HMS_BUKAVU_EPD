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
                 Gestion des Malades en ligne <small>  : MODIFICATION DE SORTIES EN STOCK</small> 
				 <img src="IMA/medicaments.png" width="120px" height="80px" /><img src="IMA/upcube.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            RECHERCHE ET MODIFICATION DE SORTIE EN STOCK DE MEDICAMENTS POUR LE SERVICE
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>L'appellation ou le sigle du service bénéficiaire</label>
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
											complète du service bénéficiaire de la livraison de médicaments à modifier.</p>
									</div>
										
								</div>
                             </div>
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM SortieMedServices, Services, Medicaments, CategoriesMed WHERE (Services.DesignService LIKE '%$Mot%' OR Services.CodeService LIKE '%$Mot%')  
											AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed AND SortieMedServices.IdMedicament=Medicaments.IdMedicament 
											AND SortieMedServices.CodeService=Services.CodeService") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) ENTREE(S) EN STOCK POUR \" $Mot \"</font></center>
														<br/>
													<table class='table'>														
														<thead>
															<tr>
																
																<th>DATE </th>
																<th>SERVICE CONCERNE </th>
																<th>MEDICAMENT LIVRE</th>																
																<th>DOSAGE</th>											
																<th>CATEGORIE</th>																
																<th>QTE DEMANDE</th>															
																<th>QTE LIVREE</th>															
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php 
													$DateSortieMedServ=new DateTime($row['DateSortieMedServ']);
													echo Date_Format($DateSortieMedServ,'d-m-Y');
												?>
											</td>
                                            <td><?php echo $row['DesignService'];?></td>                                          
                                            <td><?php echo $row['DesignMedicament'];?></td>                                          
                                            <td><?php echo $row['Dosage'];?></td>
                                            <td><?php echo $row['DesignCategorieMed'];?></td>                                          
                                            <td><?php echo $row['QteLivreeMedServ'];?></td>                                          
                                            <td><?php echo $row['QteDemandeMedServ'];?></td>                                          
                                            <td><?php echo "<a href='rech_sortie_stock_service_edit.php?id=".$row['IdSortieMedServ']."' title='Cliquez ici pour afficher le détail'><span class='glyphicon glyphicon-edit'></span> Afficher</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste de sorties en stock pour le mot $Mot, vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM SortieMedServices, Services, Medicaments, CategoriesMed WHERE SortieMedServices.IdSortieMedServ='".$_GET['id']."' 
							AND Medicaments.IdCategorieMed=CategoriesMed.IdCategorieMed AND SortieMedServices.IdMedicament=Medicaments.IdMedicament 
							AND SortieMedServices.CodeService=Services.CodeService");
						while($row=mysql_fetch_array($sql)){
					?>
					
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                               
									<div class="col-lg-4"> 
										<input type="hidden" class="form-control" name="IdSortieMedServ" value="<?php echo $row['IdSortieMedServ'];?>" readonly >
										<input type="hidden" class="form-control" name="IdMedicament" value="<?php echo $row['IdMedicament'];?>" readonly >
										
										<label>Date de livraison de médicament</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control" name="DateSortieMedServ" value="<?php echo $row['DateSortieMedServ'];?>"  readonly >
                                        </div>
										
										<label>Désignation du médicament livré</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Designation" value="<?php echo $row['DesignMedicament'] ." ". $row['Dosage'];?>" readonly >
                                        </div>
										
										<label>Forme du médicament livré</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="Forme" value="<?php echo $row['Forme'];?>" readonly >
                                        </div>
										
                                    </div>
									<div class="col-lg-4"> 
										<label>Service Bénéficiaire</label>
                                        <div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
												<select class="form-control" name="CodeService"  required >
													<option value="<?php echo $row['CodeService'];?>"><?php echo $row['DesignService'];?></option>
													<?php
														require_once("BDD/Connect.php");
														$sel=mysql_query("SELECT * FROM Services WHERE CodeService !='".$row['CodeService']."'");
														if(mysql_num_rows($sel)>0){
															while($li=mysql_fetch_array($sel)){
																echo "<option value='".$li['CodeService']."'>".$li['DesignService']."</option>";
															}
														}
													?>											
												</select>
										</div>
										<label>Quantité demandée par le service</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="QteDemandeMedServ" value="<?php echo $row['QteDemandeMedServ'];?>" placeholder="Quantité demandée par le service" required >
                                        </div>
										<label>Quantité livrée au service</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="hidden" class="form-control" name="AncQteLivree" value="<?php echo $row['QteLivreeMedServ'];?>">
                                            <input type="text" class="form-control" name="QteLivreeMedServ" value="<?php echo $row['QteLivreeMedServ'];?>" placeholder="Quantité livrée au service" required >
                                        </div>
									</div>
									<div class="col-lg-4">
										<label>Prix unitaire du médicament livré</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="PrixUnitMedServ" value="<?php echo $row['PrixUnitMedServ'];?>" placeholder="Quantité demandée par le service" required >
                                        </div>	
										<label>Observation</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="fa fa-file"></span></span>
                                            <input type="text" class="form-control" name="Observation" value="<?php echo $row['Observation'];?>" placeholder="Observation" required >
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
		
		$IdSortieMedServ=$_POST['IdSortieMedServ'];
		$IdMedicament=$_POST['IdMedicament'];
		$CodeService=$_POST['CodeService'];
		$QteDemandeMedServ=$_POST['QteDemandeMedServ'];
		$AncQteLivree=$_POST['AncQteLivree'];
		$QteLivreeMedServ=$_POST['QteLivreeMedServ'];
		$PrixUnitMedServ=$_POST['PrixUnitMedServ'];
		$Observation=$_POST['Observation'];
		$Designation=$_POST['Designation'];
		$MotPasse=$_POST['MotPasse'];

			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$sql=mysql_query("SELECT * FROM Medicaments WHERE IdMedicament='".$IdMedicament."'");
				$rech=mysql_fetch_array($sql);
				$Nvl=$rech['StockExistant'] + $AncQteLivree - $QteLivreeMedServ;
				if($Nvl>0){
					$req="UPDATE SortieMedServices SET CodeService='".$CodeService."', QteDemandeMedServ='".$QteDemandeMedServ."', QteLivreeMedServ='".$QteLivreeMedServ."',
						PrixUnitMedServ='".$PrixUnitMedServ."', Observation='".$Observation."' WHERE IdSortieMedServ='".$IdSortieMedServ."'";			
					$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de modification. <br>".mysql_error()."</div></div>";
					}
					else{ 
						mysql_query("UPDATE Medicaments SET StockExistant='".$Nvl."' WHERE IdMedicament='".$IdMedicament."'");
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> &nbsp; La livraison de medicament ".$Designation." au service ".$CodeService." a été modifiée avec succès. </div></div>";
					}
				}
				else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrer les modifications, car le stock deviendra négatif pour le médicament ".$Designation."</div></div>";
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