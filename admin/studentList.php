<?php require '../resources/classes/student.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$st = new student();
	$type = "0";
	if(isset($_GET['type'])){
		$type = $_GET['type'];
		$student = $st->getStudents($_GET['type']);
	}
	else
	{
		$student = $st->getStudents("Residential");
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2><?php if($type=="Residential"){ echo "Residential Student List";} else{echo "Non-Residential Student List";} ?></h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Discipline</th>
					<th>Session</th>
					<th>Class</th>
					<th>Image</th>
					<?php if($type=="Residential"){ ?>
					<th>Room No.</th>
					<?php } ?>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			 if($student){
			 foreach ($student as $app) {
			?>
				<tr class="odd gradeX">
					<td><?php echo $app['studentId']; ?></td>
					<td><?php echo $app['studentName']; ?></td>
					<td><?php echo $app['discipline']; ?></td>
					<td><?php echo $app['session']; ?></td>
					<td><?php echo $app['year']." - ".$app['term']; ?></td>
					<td><a href="zoom3.php?image=<?php echo $app['photo']; ?>&studentId=<?php echo $app['studentId']; ?>&type=<?php echo $_GET['type']; ?>"><img src="<?php echo $app['photo']; ?>" height="40px" width="60px"/></a></td>	
					<?php if($type=="Residential"){ $room=$st->getRoomNo($app['studentId']); $room=mysqli_fetch_row($room);?>	
					<td><?php echo $room[0]; ?></td>	
					<?php } ?>
				<td>
					<a href="deleteStudent.php?studentId=<?php echo $app['studentId']; ?>&type=<?php echo $_GET['type']; ?>" onclick="return confirm('Are you sure to Delete!');" >Delete Student</a> 
				</td>
				</tr>
				<?php }} ?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
