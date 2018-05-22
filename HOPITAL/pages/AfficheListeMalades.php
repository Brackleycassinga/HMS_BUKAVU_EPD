<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']){
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
				
				<?php if ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')
							require_once ("Ajout/menu.php");
					elseif ($_SESSION['Fonction']=='LABORANTIN')
							require_once ("Ajout/menuLabo.php");
					elseif ($_SESSION['Fonction']=='RECEPTIONNISTE')
						require_once ("Ajout/menuRecept.php");
					elseif ($_SESSION['Fonction']=='CAISSIER')
						require_once ("Ajout/menuCaissier.php");
					elseif ($_SESSION['Fonction']=='PHARMACIEN')
						require_once ("Ajout/menuPharmacie.php");
					elseif ($_SESSION['Fonction']=='COMPTABLE')
						require_once ("Ajout/menuCompt.php");
					elseif ($_SESSION['Fonction']=='MEDECIN')
						require_once ("Ajout/menuMedecin.php");
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LISTE DE TOUS LES MALADES </small> 
				  <img src="IMA/dep.jpg" width="140px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            VISUALISATION ET IMPRESSION DE LA LISTE DE TOUS LES MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <div class="col-lg-12">
                          
					<?php 
						
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Patients ORDER BY Idauto_Patient DESC") or die(mysql_error());
						if(mysql_num_rows($sql)>0){
					?>
							<div class="col-lg-12"> 
								<div id="Fiche"> 
									<br/>
									<div class="panel-body">
										<div class="table-responsive">
											
											<table class="table table-striped table-bordered table-hover">														
												<thead>
													<tr>
														<th>CODE ET INDEX</th>
														<th>PHOTO</th>
														<th>NOMS COMPLETS </th>
														<th>SEXE</th>
														<th>AGE</th>
														<th>ETAT CIVIL</th>	
														<th>PROFESSION</th>																													
														<th>DATE D'ARRIVEE</th>																													
														<th>ETAT </th>																
														<th>UTILISATEUR </th>																
													</tr>
												</thead>
					<?php
									while($row=mysql_fetch_array($sql)){
										$DateArrive = new DateTime($row['DateArrive']); $DateArrive = Date_Format($DateArrive,"d-m-Y");
										$util=mysql_query("SELECT * FROM Utilisateurs WHERE IdUtilisateur='".$row['IdUtilisateur']."'") or die(mysql_error());
										$tab=mysql_fetch_array($util);
					?>				
										<tbody>
											<tr>
												<td><?php echo $row['CodePatient'];?> <br/><br/><?php echo $row['IndexMal'];?> </td>
												<td><?php echo "<img  width=\"80\" height=\"80\" src=";
															echo '"Patients/';
															echo $row["Photo"];
															echo '"/>';?></td>
												<td><?php echo $row['Noms'];?></td>                                          
												<td><?php echo $row['Sexe'];?></td>                                          
												<td><?php echo $row['Age'];?></td>                                          
												<td><?php echo $row['EtatCivil'];?></td>                                          
												<td><?php echo $row['Profession'];?></td>                                          
												<td><?php echo $DateArrive;?></td>                                          
												<td><?php echo $row['Etat'];?></td>                                          
												<td><?php echo $tab['NomsUtil'];?></td>                                          
											</tr>                                      
										</tbody> 
		<?php
									}										
						}else{
							echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-remove'></span>
										Aucune suggestion trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
						}
							?>
					</table>
						</div>										
					</div>
				</div>
					</div>
				
					</div>
					<center><button type="submit" class="btn btn-success" name="Imprimer" onclick="javascript:imprimer_bloc('Fiche', 'Fiche');"><span class="glyphicon glyphicon-print"></span> Imprimer la liste des Malades</button></center>                     
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
	
	<script language="javascript">
			function imprimer_bloc(titre, objet) { 
				// Définition de la zone à imprimer 
				var zone = document.getElementById(objet).innerHTML; 
				
				// Ouverture du popup 
				var fen = window.open("", "", "height=1400, width=1500,toolbar=0, menubar=0, scrollbars=0, resizable=1,status=0, location=0, left=10, top=10"); 
				
				// style du popup 
				fen.document.body.style.color = '#000000'; 
				fen.document.body.style.backgroundColor = '#FFFFFF'; 
				fen.document.body.style.padding = "20px"; 
				fen.document.body.style.border = "1px solid black"; 
				
				// Ajout des données a imprimer 
				fen.document.title = titre; 
				fen.document.body.innerHTML += " " + zone + " "; 
				
				// Impression du popup 
				fen.window.print(); 
				
				//Fermeture du popup 
				fen.window.close(); 
				return true; 
			} 
		</script>

</body>

</html>
<?php
	}else{
		header('Location:index.php');
	}
?>