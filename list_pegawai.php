<?php

include_once('connection.php');

if(isset($_REQUEST) && isset($_REQUEST['method']))
{
	if ($_REQUEST['method'] == "post") {
		$nama = $_GET['nama'];
		$bagian = $_GET['bagian'];
		$nomor_hp = $_GET['nomor_hp'];

		$insert = "INSERT INTO pegawai (nama,bagian,nomor_hp) VALUES ('".$nama."','".$bagian."','".$nomor_hp."')";
		$req = $connect->query($insert);

		if($req === TRUE)
		{
			$data = [
					'status' => "oke",
					'message' => "Successfully add new Employee"
			];
		}
		else
		{
			$data = [
					'status' => "FAIL",
					'message' => "Something went wrong"
			];
		}

		header('Content-type: application/json');
		echo json_encode($data);

	}

	if ($_REQUEST['method'] == "put") {
		$id = $_GET['id'];
		$nama = $_GET['nama'];
		$bagian = $_GET['bagian'];
		$nomor_hp = $_GET['nomor_hp'];

		$update = "UPDATE pegawai set nama='".$nama."',bagian = '".$bagian."', nomor_hp='".$nomor_hp."' WHERE id='".$id."'";
		$req = $connect->query($update);

		if($req === TRUE)
		{
			$data = [
					'status' => "oke",
					'message' => "Successfully update new Employee"
			];
		}
		else
		{
			$data = [
					'status' => "FAIL",
					'message' => "Something went wrong"
			];
		}

		header('Content-type: application/json');
		echo json_encode($data);
	}

	if ($_REQUEST['method'] == "get") {

		$select = "SELECT * FROM pegawai";
		$req = $connect->query($select);

		$array = [];
		while ($data = $req->fetch_assoc()) {
			$array[] = $data;
		}
		header('Content-type: application/json');
		echo json_encode($array);

	}


	if ($_REQUEST['method'] == "delete") {
		$id = $_GET['id'];
		
		$delete = "DELETE FROM pegawai where id='".$id."'";
		$req = $connect->query($delete);

		if($req === TRUE)
		{
			$data = [
					'status' => "oke",
					'message' => "Successfully delete the Employee"
			];
		}
		else
		{
			$data = [
					'status' => "FAIL",
					'message' => "Something went wrong"
			];
		}

		header('Content-type: application/json');
		echo json_encode($data);
	}
}
?>