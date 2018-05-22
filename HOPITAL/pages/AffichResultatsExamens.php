<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MEDECIN' OR $_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG' OR $_SESSION['Fonction']=='LABORANTIN')){
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
					  elseif ($_SESSION['Fonction']=='LABORANTIN')
							require_once ("Ajout/menuLabo.php");
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : RESULTATS DES EXAMENS / TESTS</small> 
				  <img src="IMA/recyclage.png" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          AFFICHAGE DES RESULTATS DES EXAMENS / TESTS
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>N° de la Prescription, Code ou Nom du malade</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre recherche" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-primary" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, PrescExamens, Patients WHERE (Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%' OR PrescExamens.IdPrescription LIKE '%$Mot%') AND Patients.Idauto_Patient=PrescExamens.Idauto_Patient AND Utilisateurs.IdUtilisateur=PrescExamens.IdUtilisateur") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>Num.</th>
																<th>DATE PRESCR.</th>
																<th>CODE MALADE</th>
																<th>PHOTO</th>
																<th>NOMS DU MALADE</th>
																<th>SEXE</th>
																<th>EXAMENS</th>
																<th>MEDECIN</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdPrescription'];?></td>
                                            <td><?php $DatePrescription = new DateTime($row['DatePrescription']);
														echo Date_Format($DatePrescription,'d-m-Y');
												?>
											</td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php
											// Affichage des examens prescrits
												$Examen = "";
												$rechEx=mysql_query("SELECT * FROM PrescExamensCompose, Examens WHERE PrescExamensCompose.IdPrescription='".$row['IdPrescription']."' AND PrescExamensCompose.IdExamen=Examens.IdExamen");
													if(mysql_num_rows($rechEx)>0){
														while($ligne=mysql_fetch_array($rechEx)){
															$Examen="".$Examen."".$ligne['DesignExamen'].";";
														}													
														echo $Examen;
													}
												?>
											</td>                                          
                                            <td><?php echo $row['NomsUtil'];?></td>                                          
                                            <td><?php $search=mysql_query("SELECT * FROM ResultExamens WHERE ResultExamens.IdPrescription='".$row['IdPrescription']."'");
												if(mysql_num_rows($search)>0){
													$lg=mysql_fetch_array($search);
													echo "<a href='AffichResultatsExamens.php?id=".$lg['IdResultat']."' title='Afficher les resultats du labo'><span class='glyphicon glyphicon-list'></span> Afficher les reslutats</a>";
												}
												else
													echo "<p style='color:red;'><span class='fa fa-warning'></span> Resultat non encore dispo.</p>";
												?>
											</td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des resultats demandés pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM ResultExamens, PrescExamens, Patients WHERE ResultExamens.IdResultat='".$_GET['id']."' 
							AND ResultExamens.IdPrescription=PrescExamens.IdPrescription AND Patients.Idauto_Patient=PrescExamens.Idauto_Patient");
							$row=mysql_fetch_array($sql);
							$Util=mysql_query("SELECT * FROM ResultExamens, Utilisateurs WHERE ResultExamens.IdResultat='".$_GET['id']."' AND 
								ResultExamens.IdUtilisateur=Utilisateurs.IdUtilisateur");
							$li=mysql_fetch_array($Util);
					?>

							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-lg-12">
										<center><h2>RESULTATS DES EXAMENS </h2></center>
									</div>					
									<div class="col-lg-6">					
										<label>Code du Malade : <?php echo $row["CodePatient"]; ?></label>
										<br>
										<label>Noms du Malade : <?php echo $row["Noms"]; ?></label>
										<br>
										<label>Age : <?php echo $row["Age"]; ?></label>	
										<br>
										<label>LABORANTIN : <?php echo $li["NomsUtil"]; ?></label>										
									</div>
									<div class="col-lg-6">					
										<label style="float:right;">Photo du Malade 
										<br>
											<?php 	echo "<img  width=\"80\" float=\" right\" height=\"80\" src=";
													echo '"Patients/';
													echo $row["Photo"];
													echo '"/>';
											?>	
										</label>							
									</div>
								<?php
									$rech=mysql_query("SELECT * FROM ResultExamensCompose, Examens WHERE IdResultat='".$_GET['id']."' AND ResultExamensCompose.IdExamen=Examens.IdExamen") or die(mysql_error());
									if(mysql_num_rows($rech)>0){								
								?>
										<div class='col-lg-12'>                       
											<div class='panel-body'>
												<div class='table-responsive'>													
													<table class='table'>														
														<thead style="color:red;">
															<tr>																
																<th>DESIGNATION EXAMEN</th>
																<th>RESULTAT TROUVE</th>																																
															</tr>
														</thead>
								<?php
								 		while($ligne=mysql_fetch_array($rech)){
								?>							
											<tbody>
												<tr>
													<td><?php echo $ligne['DesignExamen'];?></td>
													<td><?php echo $ligne['ResultatPropre'];?></td>													
												</tr>
											</tbody>
								<?php 
										}
								?>
													</table>
												</div>									
											</div>					
										</div>										
					
						<?php
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