<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
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
		$sWhere.= " and categoria like '%$q%' or nombre like '%$q%'";
			
		}
		
		$sWhere.=" order by id DESC";
		include 'pagination.php'; //include pagination file
		//pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 20; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'buscar_peliculas.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable  $sWhere  LIMIT $offset,$per_page  ";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			  <table class="table table-hover" style="border-color: #337ab7;">
				<tr style="color: #fff; background-color: #337ab7; border-color: #337ab7;">
					<th>Nombre</th>

					<th>Categoria</th>
					<th>Director</th>	
					<th>Productor</th>
					<th>Resumen</th>	
					<th>Acción</th>		
					</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id'];
						$nombre=$row['nombre'];
						$categoria=$row['categoria'];
						$director=$row['director'];
						$productor=$row['productor'];
						$resumen=$row['resumen'];
		
					?>
					<tr>
                       	<td><?php echo utf8_encode($nombre);?></td>
                        <td><?php echo utf8_encode($categoria);?></td>
						<td><?php echo utf8_encode($director);?></td>
						<td><?php echo utf8_encode($productor); ?></td>	
						<td><?php echo utf8_encode($resumen); ?></td>	
						<td><a href="borrar_pelicula.php?id=<?php echo utf8_encode($id);?> "><button class="btn btn-danger" >eliminar</button></a>  
						<a href="editpeliculas.php?id=<?php echo utf8_encode($id);?>"><button class="btn btn-warning" >Editar</button></a></td>	
					</tr>
					<?php
				}
				?>
			  </table>
                
                <div class="table-pagination pull-right">
			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
		        </div>
			</div>
			<?php
		}
	}
?>