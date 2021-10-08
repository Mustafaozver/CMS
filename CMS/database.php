<?php
/*

ATA.PHP Database control

ID : main identify
other table conn : [Tablename]ID
  ForExample: UsersID = Users.ID

*/

$_db = mysqli_connect($ata["database"]["HOST"], $ata["database"]["user"], $ata["database"]["password"], $ata["database"]["name"]);
mysqli_query($_db,"SET NAMES utf8");

function RunQuery($sql) {
	global $_db;
	return mysqli_query($_db, $sql);
}

function GetLastID() {
	global $_db;
	return ($_db->insert_id);
}

function AddRow($toadd, $tablename) {
	$params = array();
	$values = array();
	foreach ($toadd as $param => $value) {
		array_push($params,$param);
		array_push($values,$value);
	}
	$sql = "INSERT INTO ".$tablename." (".implode(",",$params).") VALUES (\"".implode("\",\"",$values)."\");";
	return (RunQuery($sql) === true);
}

function DeleteRow($tablename, $where) {
	$sql = "DELETE FROM ".$tablename;
	if (isset($where)) $sql.= " WHERE ".$where;
	return (RunQuery($sql) === true);
}

function CountRows($tablename, $where) {
	$sql = "SELECT * FROM ".$tablename;
	if (isset($where)) $sql.= " WHERE ".$where;
	$result = RunQuery($sql);
	return $result->num_rows;
}

function ReadRows($tablename, $where) {
	$sql = "SELECT * FROM ".$tablename;
	if (isset($where)) $sql.= " WHERE ".$where;
	$result = RunQuery($sql);
	$finalrow = array();
	if ($result->num_rows == 1) {
		$rows = array();
		while($row = $result->fetch_assoc()) foreach ($row as $param => $value) $rows["".$param] = $value;
		return $rows;
	} else if ($result->num_rows > 0) {
		$rows = array();
		while($row = $result->fetch_assoc()) {
			foreach ($row as $param => $value) $rows["".$param] = $value;
			array_push($finalrow,$rows);
		}
		return $finalrow;
	} else //echo $sql;
	return false;
}

function GetRow($id, $tablename) {
	$sql = "SELECT * FROM ".$tablename." WHERE ID=\"".$id."\"";
	$result = RunQuery($sql);
	if ($result->num_rows == 1) {
		if ($row = $result->fetch_assoc()) foreach ($row as $param => $value) $rows["".$param] = $value;
		return $rows;
	} else return false;
}

function UpdateRow($toadd, $tablename) {
	if (isset($toadd["ID"])) {
		$id = "".$toadd["ID"];
		$sql = "UPDATE ".$tablename;
		$updates = array();
		unset($toadd["ID"]);
		foreach ($toadd as $param => $value) array_push($updates, $param."=\"".$value."\"");
		$sql .= " SET ".implode(", ",$updates)." WHERE ID=\"".$id."\"";
		return (RunQuery($sql) === true);
	} else return false;
}

?>