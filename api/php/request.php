<?php

  	require_once('database.php');

  	// Connexion à la bdd.
  	$db = dbConnect();
	if (!$db){
		header ('HTTP/1.1 503 Service Unavailable');
		exit;
	}

	// verification de la requête.
	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$request = substr($_SERVER['PATH_INFO'], 1);
	$request = explode('/', $request);
	$requestRessource = array_shift($request);
	// verification de l'id associé à la requête.
	
 	$id = array_shift($request);
	if ($id == ''){
		$id = NULL;
  	}
  	$data = false;

  	// select request.
  	if ($requestRessource == 'select_user'){
		$data = dbRequestUser($db);
	}

	else if($requestRessource == 'select_runners'){
		$data = dbRequestRunners($db);
	}	
	
	else if ($requestRessource == 'select_run'){
		$data = dbRequestRun($db);
	}

	else if ($requestRessource == 'select_runner'){
		$data = dbRequestRunner($db, $_GET["id"]);
	}

	else if ($requestRessource == 'get_runners'){
		$data = dbRequestUpdateRunner($db, $_GET["mail"]);
	}

	else if ($requestRessource == 'post_runner'){
		$data = dbRequestSaveRunner($db, $_GET["mail"], $_GET["nom"], $_GET["prenom"], $_GET["date"], $_GET["licence"], $_GET["valide"]);
	}

	else if ($requestRessource == 'select_ranking'){
		$data = dbRequestRunnerRanking($db, $_GET["id"]);
	}

	else if ($requestRessource == 'select_runners_not_present'){
		$data = dbRequestRunnerNotPresent($db, $_GET["course"]);
	}

	else if ($requestRessource == 'select_flag_present'){
		$data = dbRequestFlagPresent($db, $_GET["course"]);
	}

	else if ($requestRessource == 'insert_new_runner'){
		$data = dbRequestSaveNewRenner($db, $_GET["course"], $_GET["mail"], $_GET["dossart"]);
	}
	// Send data to the client.
	header('Content-Type: application/json; charset=utf-8');
	header('Cache-control: no-store, no-cache, must-revalidate');
	header('Pragma: no-cache');
	header('HTTP/1.1 200 OK');
	echo json_encode($data);
	exit;
?>
