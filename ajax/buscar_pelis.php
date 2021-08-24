<?php session_start();
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	include '../conexion.php';

	


	
?>

<?php
		$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "peliculas";
		 $sWhere = "";
		 $sWhere.="WHERE id<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and id like '%$q%' or nombre like '%$q%' or productor like '%$q%' or nombre like '%$q%' or categoria like '%$q%'";
			
		}
		  
		$sWhere.=" order by id DESC";
		include 'pagination.php'; //include pagination file
		//pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 9; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'review.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable  $sWhere  LIMIT $offset,$per_page  ";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			
			if(isset($_SESSION['usuario'])) {

				$usernameSesion = $_SESSION['usuario'];
			}
			?>
						<?php while ($row=mysqli_fetch_array($query)){
								$id=$row['id'];
								$nombre=$row['nombre'];
								$categoria= $row['categoria'];
								$director=$row['director'];
								$productor=$row['productor'];
								$resumen=$row['resumen'];


								$calificacion=10;


								if(isset($_SESSION['usuario'])) {

									$sql = $conexion->prepare('SELECT * FROM calificacion WHERE  id_pelicula = :id AND id_usuario = :id_usuario LIMIT 1');
									$sql->execute(array(':id' => $id, ':id_usuario' => $usernameSesion));
									$resultado = $sql->fetchAll();

									if ($resultado !== false){ 
										foreach ($resultado as $row) 
										{
											$calificacion=$row["calificacion"];
										}
									}
									else
									{
										$calificacion=10;
									}
								}

									$sql = $conexion->prepare('SELECT AVG(calificacion) AS promedio FROM calificacion WHERE id_pelicula= :id_pelicula LIMIT 1');
									$sql->execute(array(':id_pelicula' => $id));
									$resu = $sql->fetchAll();
									
									foreach($resu as $row)
									{
										$promedio=$row['promedio'];
									}

							?>


			<div class="review-item my-5">
				<div class="row">
					<div class="col-lg-4">
						<div class="review-pic">
							<img src="img/peliculas/peli<?php echo utf8_encode($id); ?>.jpg" alt="<?php echo utf8_encode($nombre);?>">
						</div>
					</div>
					<div class="col-lg-8">
						<div class="review-content text-box text-white">
							<div class="rating">
								<h5><i>Rating</i><span><?php echo round($promedio, 2); ?></span> / 5</h5>
							</div>
							<div class="top-meta"><?php echo utf8_encode($categoria);?> / <?php echo utf8_encode($productor); ?></div>
							
							<h3 style="margin: 0px;"><?php echo utf8_encode($nombre); ?></h3>
							<div class="calificacion my-2">

							<?php 
							
								switch($calificacion)
								{
									case 1:?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella.png" alt=""></a>  </div>
										<?php break;
									
									case 2: ?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella.png" alt=""></a>  </div>
										<?php break;
									case 3: ?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella2.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella.png" alt=""></a>  </div>
										<?php break;
									case 4: ?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella2.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella.png" alt=""></a>  </div>
										<?php break;
									case 5: ?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella2.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella2.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella2.png" alt=""></a>  </div>
										<?php break;
									case 10: ?>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=1"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=2"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=3"><img src="img/estrella.png" alt=""> </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=4"><img src="img/estrella.png" alt=""></a>  </div>
											<div class="estrella2 mx-1"> <a href="calificacion.php?peli=<?php echo utf8_encode($id);?>&calificacion=5"><img src="img/estrella.png" alt=""></a>  </div>
										<?php break;
								}
							?>

								



							</div>
							<p ><?php echo utf8_encode($resumen)?></p>
							<a href="pelicula.php?id=<?php echo utf8_encode($id); ?>" class="read-more">ver más  <img src="img/icons/double-arrow.png" alt="#"/></a>
						</div>
					</div>
				</div>
			</div>
							


						<?php
						}
						?>
						
						<div class="table-pagination pull-right">
							<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
						</div>
					</div>
					

			
			<?php
		}
	}

	
function _idusuario()
{
	$correo= $_SESSION['usuario'];
	include '../conexion.php';
    $statement = $conexion->prepare('SELECT * FROM usuario WHERE correo = :correo limit 1');
        //se ejecuta sentencia
        $statement->execute(array(
            ':correo' => $correo
        ));
        $usuario = $statement->fetch();
        if ($usuario !== false){ 
            foreach ($usuario as $row) {
                return $row["id"];
                }
          }
        else{
            return -1;
		}
}
?>