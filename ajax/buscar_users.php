<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
?>

<?php
		$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$sTable = "actores";
		 $sWhere = "";
		 $sWhere.="WHERE id<=1000";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and id like '%$q%' or nombre like '%$q%'";
			
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
		$reload = 'games.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable  $sWhere  LIMIT $offset,$per_page  ";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
						<?php while ($row=mysqli_fetch_array($query)){
								$id=$row['id'];
								$nombre=$row['nombre'];
		
							?>

							<div class="col-lg-4 col-md-6">
								<div class="game-item">
									<img src="img/posters/posert<?php echo utf8_encode($id);?>.jpg" alt="#">
									<h5><?php  echo utf8_encode($nombre); ?></h5>
									<a href="game-single.php?id=<?php echo utf8_encode($id); ?>" class="read-more">ver más  <img src="img/icons/double-arrow.png" alt="#"/></a>
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


	
?>