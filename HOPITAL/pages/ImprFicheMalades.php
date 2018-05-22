<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']='RECEPTIONNISTE'){
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
				
				<?php 
						require_once ("Ajout/menuRecept.php");
					
				?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : FICHE DE MALADE </small> 
				  <img src="IMA/dep.jpg" width="140px" height="80px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            VISUALISATION ET IMPRESSION DES FICHES DES MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Veuillez entrer le nom ou code du Malade</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Nom ou code du Malade concerné par la fiche" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
									
								</div>
								<div class="col-lg-6">
								
                             </div>
                           </div>
							

					<?php 
						if(isset($_POST['Rechercher'])){
							$Mot = $_POST['Mot'];
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Patients WHERE Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%'") or die(mysql_error());
						if(mysql_num_rows($sql)>0){		
							echo"<div class='col-lg-12'>                       
									<div class='panel-body'>
										<div class='table-responsive'>
											<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
											<br/>
											<table class='table'>														
												<thead>
													<tr>
														<th>CODE</th>
														<th>PHOTO DU MALADE</th>
														<th>NOMS COMPLETS DU MALADE</th>
														<th>SEXE</th>
														<th>AGE</th>
														<th>PROFESSION</th>
														<th>ACTION ENVISAGEE</th>																
													</tr>
												</thead>";
							while($row=mysql_fetch_array($sql)){
					?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['Age'];?></td>                                          
                                            <td><?php echo $row['Profession'];?></td>                                          
                                            <td><?php echo "<a href='ImprFicheMalades.php?id=".$row['Idauto_Patient']."' title='Supprimer le patient'><span class='glyphicon glyphicon-list'></span> Afficher détail</a>";?></td>                                           
                                        </tr>                                      
                                    </tbody>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
				<?php 
					if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Patients WHERE Idauto_Patient='".$_GET['id']."'");
						while($row=mysql_fetch_array($sql)){
				?>
				<div class="col-lg-2">
				</div>				
								
								
				<div class="col-lg-6">
				<div id="Fiche">
                    <div class="panel panel-info">
							<div class="panel-heading">
								<center><span class="glyphicon glyphicon-file"></span> <strong>FICHE DU MALADE N° : <?php echo $row['CodePatient']; ?></strong>
								<hr>
								</center>
								
							</div>
						
						<div class="panel-body">
							
								<img  width="120"  style="float:right;" height="120" src="Patients/<?php echo $row["Photo"];?>"/>
							
							<p><b>NOMS DU MALADE : </b><?php echo $row['Noms']; ?></p>
							<p><b>INDEX DU MALADE : </b><?php echo $row['IndexMal']; ?></p>
							<p><b>AGE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['Age']; ?></p>
							<p><b>SEXE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['Sexe']; ?> </p>
							<p><b>PROFESSION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['Profession']; ?></p>
							<p><b>ETAT CIVIL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['EtatCivil']; ?></p>
							<p><b>ADRESSE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['Adresse']; ?></p>
							<p><b>TELEPHONE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><?php echo $row['NumTel']; ?></p>
							
						</div>										
					</div>
				</div>
					<center><button type="submit" class="btn btn-success" name="Imprimer" onclick="javascript:imprimer_bloc('Fiche', 'Fiche');"><span class="glyphicon glyphicon-print"></span> Imprimer la fiche du Malade</button></center>
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
	
	<script language="javascript">
			function imprimer_bloc(titre, objet) { 
				// Définition de la zone à imprimer 
				var zone = document.getElementById(objet).innerHTML; 
				
				// Ouverture du popup 
				var fen = window.open("", "", "height=400, width=500,toolbar=0, menubar=0, scrollbars=0, resizable=1,status=0, location=0, left=10, top=10"); 
				
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