<?php  
require("../database/database.php");
require("manage.php");

if(isset($_POST["anggota"])){
	$obj = new Manage();
	$result = $obj->manageRecordWithPagination("anggota", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	$no = 1;
	if(count($rows) > 0){
		$no = (($_POST["pageno"] - 1) * 10)+1;
		foreach ($rows as $row) { 
			?>
			<tr>
				<th scope="row"><?php echo $no++ ?></th>
				<td><?php echo $row["username"] ?></td>
				<td><?php echo $row["email"] ?></td>
				<td><?php echo $row["alamat"]; ?></td>
				<td><?php echo $row["no_hp"] ?></td>
				<td><?php echo $row["jenis_kelamin"] ?></td>
				<td>
					<button class="btn btn-default btn-icon edit-anggota" eid="<?php echo $row['id_user'] ?>"><i class="zmdi zmdi-edit"></i></button>
                    <button class="btn btn-default btn-icon delete-anggota" did="<?php echo $row['id_user'] ?>"><i class="zmdi zmdi-delete"></i></button>

				</td>
			</tr>
			
			<?php
		}
		?>
		<tr>
			<td colspan="7"><?php echo $pagination ?></td>
		</tr>
		<?php
		exit();
	}else{
		?>
		<tr>
			<td colspan="7"><center>BELUM ADA DATA</center></td>
		</tr>
		<?php
	}exit();	
}

// Tambah Anggota
if(isset($_POST["username_anggota"]) && isset($_POST['password_anggota'])) {
	$user = new Manage();
	$result = $user->addAnggota($_POST["username_anggota"],$_POST["password_anggota"], $_POST["address_anggota"], $_POST["phone_anggota"], $_POST["sex_anggota"]);
	echo $result;
	exit();
}

// Hapus Anggota
if(isset($_POST["deleteAnggota"])){
	$user = new Manage();
	$result = $user->deleteAnggota("deleteAnggota" ,$_POST["id"]);
	echo $result;
	exit();
}

// get json Anggota
if(isset($_POST["editAnggota"])){
	$user = new Manage();
	$result = $user->getSingleRecord("editAnggota" ,$_POST["id"]);
	echo json_encode($result);
	exit();
}

// Update Anggota
if(isset($_POST["edit_username_anggota"]) && isset($_POST['edit_address_anggota'])) {
	$user = new Manage();
	$result = $user->updateAnggota($_POST["edit_username_anggota"], $_POST["edit_address_anggota"], $_POST["edit_phone_anggota"], $_POST["edit_sex_anggota"], $_POST["idAnggota"]);
	echo $result;
	exit();
}
?>