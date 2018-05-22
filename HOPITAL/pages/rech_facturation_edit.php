<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='COMPTABLE'){
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
				<?php require_once ("Ajout/menuCompt.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : MODIFICATION DE FACTURATION</small> 
				  <img src="IMA/im38.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           RECHERCHE DE LA FACTURATION A MODIFIER
                        </div>
                        <div class="panel-body">
                            <div class="row">								
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade à facturer</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
											nom du malade à rechercher dans la base de données.</p>
										</div>
										
								</div>
                             </div>
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM  Facturations, Patients WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
										AND Facturations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE DE FACTURE</th>
																<th>CODE</th>
																<th>PHOTO </th>
																<th>NOMS COMPLETS </th>
																<th>SEXE</th>																
																<th>MONTANT FACTURE</th>																
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
													<td><?php echo $row['MontantFacture'];?></td>                                          
																									
													<td><?php echo "<a href='rech_facturation_edit.php?id=".$row['IdFacturation']."' title='Cliquez ici pour modifier la facture '><span class='fa fa-list'></span> Visualisez</a>";	?>
													</td>                                           
												</tr>                                      
											</tbody> 
							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des factures pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
	
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM  Facturations, Patients WHERE Facturations.IdFacturation='".$_GET['id']."' AND Facturations.Idauto_Patient=Patients.Idauto_Patient") or die(mysql_error());
								while($row=mysql_fetch_array($sql)){
					?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="col-lg-2">							
							<label>Photo du Malade </label>
							<div class="form-group input-group"> 		
								<img  width="120"  style="float:right;" height="120" src="Patients/<?php echo $row["Photo"];?>"/>
							</div>
						</div>
						<div class="col-lg-4">							
						<label>Code du Malade concerné par la facture</label>
                            <div class="form-group input-group"> 		
								<span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span> </span>                                           
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
                            </div>
							<label>Noms du Malade concerné par la facture</label>
                            <div class="form-group input-group"> 		
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> </span>                                           
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
                            </div>
                        </div>
                       	<div class="col-lg-4">							
						<label>Monant Facturé</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="IdFacturation" value="<?php echo $row['IdFacturation']; ?>"></tr>		
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span> </span>                                           
								<input type="text" class="form-control" name="MontantFacture" value="<?php echo $row['MontantFacture']; ?>" required >
                            </div>
						<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
                        </div>
                       						
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
						</div>					
					</form>
				
					<?php } }?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdFacturation=$_POST['IdFacturation'];		
		$MontantFacture=$_POST['MontantFacture'];	
		$MotPasse=$_POST['MotPasse'];
		$Noms=$_POST['Noms'];
		
			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$req=mysql_query("UPDATE Facturations SET MontantFacture='".$MontantFacture."' WHERE Facturations.IdFacturation='".$IdFacturation."'")or die(mysql_error());
					
						if (!$req){
							echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-remove'></span>Echec de modification de la facture, vérifiez les données saisies</div></div>";
						}
						else{ 
							echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-ok'></span> Le montant de la facture du malade ".$Noms." a été modifiée correctement, le nouveau montant est ".$MontantFacture." </div></div>";
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