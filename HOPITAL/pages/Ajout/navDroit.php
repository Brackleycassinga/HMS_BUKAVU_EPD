<?php
	// session_start();
	require_once("BDD/Connect.php");
	$sql=mysql_query("SELECT * FROM Utilisateurs WHERE Utilisateurs.IdUtilisateur='".$_SESSION['IdUtilisateur']."'") or die(mysql_error());
	$lig=mysql_fetch_array($sql);
?>
            <div class="navbar-default sidebar" role="navigation" style="margin-top:300px;">
                
                    <div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-user"></span> PERSONNE CONNECTEE
							</div>
							<div class="panel-body">
								<center><td><?php echo "<img  width=\"80\" height=\"80\" src=";
										  echo '"Users/';
										  echo $lig["Photo"];
										  echo '"/>';?></td>
								</center>
								<br><hr>
								<strong>NOM : </strong> <?php echo $_SESSION['Noms']; ?><br/>								 
								<hr>
								<strong>FONCTION : </strong><?php echo $_SESSION['Fonction']; ?><br/>
								
								<hr>
							</div>
						</div>
					
					</div>
            </div>
			
	