<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='RECEPTIONNISTE'){
		require_once("BDD/Connect.php");
		$select = mysql_query("SELECT max(Idauto_Patient) FROM Patients") or die(mysql_error());
		$res=mysql_fetch_array($select);
		$max=$res[0]+1;
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

    <div IdUtilisateur="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php require_once ("Ajout/menuRecept.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : AJOUT DES NOUVEAUX PATIENTS</small> 
				  <img src="IMA/defPatient.jpg" width="80px" height="60px" margin-right:20px; border-radius:20px"/>
             </h1>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            AJOUT DES NOUVEAUX PATIENTS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="save_Patients.php?save=ok" method="POST" enctype="multipart/form-data">
                                       	<label>Numéro du Malade à ajouter (automatique)</label>									
										<div class="form-group input-group">
										    <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                            <input type="text" class="form-control" name="CodePatient" value="<?php echo "00".$max."/".date("Y")."/NHH"; ?>" readonly >
                                        </div>
										
										<label>Index du Malade</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                            <input type="text" class="form-control" name="IndexMal" placeholder="Index attribué au malade" >
                                        </div>
										
										<label>Nom et Post-nom du Malade</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="Noms" placeholder="Nom et post-nom de l'utilisateur" required >
                                        </div>
										
										<label>Age du Malade (en Nombre)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="Age" placeholder="Age du Malade" required >
                                        </div>
										
                                        <div class="form-group"> 
										<label>Sexe</label>                                           
                                            <select class="form-control" name="Sexe" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option>MASCULIN</option>
												<option>FEMININ</option>																						
											</select>
                                        </div>
										
										<label>Profession du Malade</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="text" class="form-control" name="Profession" placeholder="Profession exercée du Malade" required >
                                        </div>
                                        
										                  									
                                </div>  
								
								<div class="col-lg-6">						
											<label>Date d'arrivée du malade </label>
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
										
										<div class="form-group"> 
										<label>Etat civil</label>                                           
                                            <select class="form-control" name="EtatCivil" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option>CELIBATAIRE</option>
												<option>MARIE(E)</option>												
												<option>DIVORCE(E)</option>												
												<option>VEUF(VE)</option>												
											</select>
                                        </div>
										
										<label>Adresse de résidence(Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" class="form-control" name="Adresse" placeholder="Adresse du domicile" >
                                        </div>
										
										<label>Numéro de téléphone (Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                            <input type="text" class="form-control" name="NumTel" placeholder="Numéro de téléphone" >
                                        </div>
                                                     
										<label>Photo du Malade (Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-film"></span>*</span>
                                            <input type="file" class="form-control" name="Photo" placeholder="Sélectionnez une photo" >
                                        </div>                                                                               									
                                </div>
  
								<div class="col-lg-12">
									<center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer le malade <span class="glyphicon glyphicon-user"></span> </button></center>
								</div>
								
							 </form>
					<br/>
							 

						 
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