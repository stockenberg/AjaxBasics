<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 18.09.17
 * Time: 09:56
 */

/**
 *
GET localhost:8000/ajax.php?p=tasks&action=all
// Get all Tasks

GET localhost:8000/ajax.php?p=tasks&action=delete&id=ID
// DELETE TASK BY ID

GET localhost:8000/ajax.php?p=tasks&action=complete&id=ID
// COMPLETE Task

POST localhost:8000/ajax.php?p=tasks
// Insert Task

 */

$user = "root";
$pass = "admin";

$dbh = new PDO('mysql:host=localhost;dbname=ajax;charset=utf8', $user, $pass);


switch ($_GET['p']){
	case 'tasks':

		switch ($_GET['action']){

			case 'all':

				$sql = "SELECT * FROM tasks WHERE closed = 0";
				$stmt = $dbh->prepare($sql);
				$stmt->execute();

				$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($res);

				break;

			case 'delete':
				$sql = 'DELETE FROM tasks WHERE id = :id';
				$stmt = $dbh->prepare($sql);
				$stmt->execute(
					[
						':id' => $_GET['id']
					]
				);
				break;

			case 'complete':
				$sql = 'UPDATE tasks SET closed = :closed WHERE id = :id';
				$stmt = $dbh->prepare($sql);
				$stmt->execute(
					[
						':closed' => 1,
						':id' => $_GET['id']
					]
				);
				break;

			default:
				if(!empty($_POST)){
					if($_POST['task_title'] === ""){
						echo json_encode(['error' => "Das Feld darf nicht leer sein", 'success' => false]);
					}else{
						$sql = 'INSERT INTO tasks (title, closed) VALUES (:title, :closed)';
						$stmt = $dbh->prepare($sql);
						$stmt->execute([':title' => $_POST['task_title'], ':closed' => 0]);
						echo json_encode(['error' => false, 'success' => true]);
					}
				}

				break;

		}

		break;
}



?>

