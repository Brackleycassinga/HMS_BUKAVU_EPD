<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
		require_once("BDD/connect.php");		
			$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, Services WHERE Services.CodeService=Utilisateurs.CodeService") or die(mysql_error());
				
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
				
				<?php require_once ("Ajout/menu.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : ACCES DES UTILISATEURS </small> 
				 <img src="IMA/nouser.jpg" width="100px" height="80px"/> 
             </h1>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                           LISTE DES UTILISATEURS DU NEW HOPE HOSPITAL
                        </div>
                        <div class="panel-body">
                            <div class="row"> 
							 <?php
								if (isset($_GET['err'])){
								echo "<div class='col-lg-12'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										<span class='glyphicon glyphicon-remove'></span>Echec de modification de l'utilisateur! Veuillez réessayer: </div></div>";
								}
								elseif(isset($_GET['edit'])){ 
									echo "<div class='col-lg-12'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Modification de l'utilisateur effectuée avec succès</div></div>";
								}
				?>
							 <?php
								if (mysql_num_rows($sqlSearch)>0){
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI LES UTILISATEURS DEJA ENREGISTRES DANS LA BASE DE DONNEES</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																
																<th>PHOTO</th>
																<th>NOM COMPLET DE L'UTILISATEUR</th>
																<th>SERVICE</th>																
																<th>FONCTION</th>																
																<th>ACCES A LA BASE</th>																
																<th>ACTION</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                           
                                            <td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Users/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['NomsUtil'];?></td>
                                            <td><?php echo $row['DesignService'];?></td>
                                            <td><?php echo $row['Fonction'];?></td>                                            
                                            <td><?php echo $row['Etat'];?></td>                                            
                                            <td><?php 
													if($row['Etat']=='AUTORISE')
														echo "<a href='BloquerAccesUtilisateurs.php?idB=".$row['IdUtilisateur']."' title='Bloquer Accès' style='color:red;'><span class='glyphicon glyphicon-remove'></span> Bloquer</a>";
													else echo "<a href='BloquerAccesUtilisateurs.php?idA=".$row['IdUtilisateur']."' title='Autoriser Accès' style='color:green;'><span class='glyphicon glyphicon-ok'></span> Autoriser</a>";
												?>
											</td>
											<td><?php 
													echo "<a href='ModifUtilisateur.php?idut=".$row['IdUtilisateur']."' title='Modifier utilisateur' style='color:green;'><span class='glyphicon glyphicon-edit'></span> Modifier</a>";
												?>
											</td>
                                        </tr>                                      
                                   </tbody>
							<?php
										}	
									// echo"</tbody>";									
								}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucun Utilisateur trouvé </div></div>";
									}
								
							?>

					<?php 
						if(isset($_GET['idB'])){
						require_once("BDD/connect.php");
							$req=mysql_query("UPDATE Utilisateurs SET Etat='NON AUTORISE' WHERE Utilisateurs.IdUtilisateur='".$_GET['idB']."'")or die(mysql_error());
								if (!$req){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
													<span class='glyphicon glyphicon-remove'></span>Echec de modification </div></div>";
									}
								else{ 
									header("location:BloquerAccesUtilisateurs.php");
								}
						}
					?>
					
					<?php 
						if(isset($_GET['idA'])){
						require_once("BDD/connect.php");
							$req=mysql_query("UPDATE Utilisateurs SET Etat='AUTORISE' WHERE Utilisateurs.IdUtilisateur='".$_GET['idA']."'")or die(mysql_error());
								if (!$req){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
													<span class='glyphicon glyphicon-remove'></span>Echec de modification </div></div>";
									}
								else{ 
									header("location:BloquerAccesUtilisateurs.php");
								}
						}
					?>

							
<?php
	// if(isset($_POST['Modifier'])){
		
		// $IdUtilisateur=$_POST['IdUtilisateur'];
		// $Fonction=$_POST['Fonction'];
			
			// require_once("BDD/connect.php");
			
			// $req=mysql_query("UPDATE Utilisateurs SET Fonction='$Fonction' WHERE Utilisateurs.IdUtilisateur='$IdUtilisateur'")or die(mysql_error());
				
					// if (!$req){
						// echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								// <span class='glyphicon glyphicon-remove'></span>Echec de modification de la fonction </div></div>";
					// }
					// else{ 
						// header("location:ModifAccesUtilisateurs.php");
					// }
			// }
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