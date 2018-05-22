<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='LABORANTIN'){
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
				
				<?php require_once ("Ajout/menuLabo.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : SUPPRESSION DES EXAMENS </small> 
				 <img src="IMA/del.jpg" width="120px" height="80px" />
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            RECHERCHE ET SUPPRESSION DES EXAMENS
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>L'appellation de l'examen à rechercher</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-danger" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-primary">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir une partie ou l'appellation 
											complète de l'examen à rechercher dans la base de données.</p>
									</div>
										
								</div>
                             </div>
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Examens, CategoriesExamens WHERE Examens.DesignExamen LIKE '%$Mot%' AND Examens.IdCategorie=CategoriesExamens.IdCategorie") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) DU MOT \" $Mot \"</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>NUM.</th>
																<th>DESIGNATION DE L'EXAMEN</th>																
																<th>PRIX PREVU</th>																
																<th>CATEGORIE</th>																
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['IdExamen'];?></td>
                                            <td><?php echo $row['DesignExamen'];?></td>                                          
                                            <td><?php echo $row['PrixPrevu'];?></td>                                          
                                            <td><?php echo $row['DesignCategorie'];?></td>                                          
                                            <td><?php echo "<a href='SuppExamens.php?id=".$row['IdExamen']."' title='Afficher examen'><span class='glyphicon glyphicon-list'></span> Afficher les détails</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée dans la liste des examens pour le mot $Mot, vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Examens, CategoriesExamens WHERE Examens.IdExamen='".$_GET['id']."' AND Examens.IdCategorie=CategoriesExamens.IdCategorie");
						while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="col-lg-6">
							
							<label>Designation de l'examen</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="IdExamen" value="<?php echo $row['IdExamen']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span> </span>                                           
								<input type="text" class="form-control" name="DesignExamen" value="<?php echo $row['DesignExamen']; ?>" readonly >
                            </div>
							<label>Prix Prévu</label>
                            <div class="form-group input-group"> 		
								<span class="input-group-addon"><span class="fa fa-dollar"></span></span> </span>                                           
								<input type="text" class="form-control" name="PrixPrevu" value="<?php echo $row['PrixPrevu']; ?>" disabled >
                            </div>
							<label>Catégorie d'appartenance</label>
							<div class="form-group input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
                                <select class="form-control" name="IdCategorie" style="width:580px;" disabled >
									<option value="<?php echo $row['IdCategorie']; ?>"><?php echo $row['DesignCategorie']; ?></option>
										<?php
											require_once("BDD/Connect.php");
											$sel=mysql_query("SELECT * FROM CategoriesExamens");
											if(mysql_num_rows($sel)>0){
												while($row=mysql_fetch_array($sel)){
													echo "<option value='".$row['IdCategorie']."'>".$row['DesignCategorie']."</option>";
												}
											}
										?>											
								</select>
                            </div>
                        </div>
                       						
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-danger" name="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer définitivement cet examen ?');"><span class="glyphicon glyphicon-trash"></span> Supprimer l'examen de la liste</button></center>
						</div>					
					</form>
				
					<?php } }?>

							
<?php
	if(isset($_POST['Supprimer'])){
		
		$IdExamen=$_POST['IdExamen'];		
		
			require_once("BDD/connect.php");
			
			$req=mysql_query("DELETE FROM Examens WHERE Examens.IdExamen='".$IdExamen."'")or die(mysql_error());
				
					if (!$req){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de suppression de l'examen.<br>".mysql_error()."</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> L'examen ".$_POST['DesignExamen']." a été supprimée correctement </div></div>";
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