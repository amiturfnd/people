<?php 
require '../../const.php';
require_once RootDir.'/vendor/autoload.php';
require_once RootDir.'/config/DbConn.php';
use MongoId;
use MongoClient;
use Slim\Slim;
$app = new Slim(array('debug' => true));

$app->post('/addPeople', function() use($app){
	$input = $app->request()->post();
	$strFields = ['email','f_name','l_name','gender','occupation'];
	foreach ($input as $key => $value) {
		if(in_array($key, $strFields)) $value = "'".$value."'";
		if (!empty($value) && $key!='email') {
			if(isset($fields)) $fields = $fields.', '.$key;
			else $fields = $key;

			if(isset($values)) $values = $values.', '.$value;
			else $values = $value;
		}
	}

    $DbConn = new DbConn();
    try {
    	$DbConn->conn->autocommit(FALSE);
    	
    	$sql1 = "INSERT INTO users (email, reg_date) VALUES ('".$input['email']."', ".time().")";
    	$result1 = $DbConn->conn->query($sql1);
    	$sql2 = "INSERT INTO profile (user_id, ".$fields.", last_modified) VALUES (".mysqli_insert_id($DbConn->conn).", ".$values.", ".time().")";
    	$result2 = $DbConn->conn->query($sql2);
    	
    	if($result1 && $result2) {
    		echo mysqli_insert_id($DbConn->conn);
    		$DbConn->conn->commit();
    	} else {
    		echo "Error occured";
    		$DbConn->conn->rollback();
    	}
    } catch (Exception $e) {
	    $DbConn->conn->rollback();
	    echo $e->getMessage();
	}
	$DbConn->close();
});

$app->post('/addAdmin', function() use($app){
	$input = $app->request()->post();
    $mongo = new MongoClient ();
	$db = $mongo->people;
	$a = $db->peoples->insert($input);
	var_dump($a);
});

$app->post('/addAddress', function() use($app){
	$input = $app->request()->post();
 //    $mongo = new MongoClient ();
	// $db = $mongo->people;
	// $a = $db->peoples->insert($input);
	var_dump($input);
});

$app->post('/changePassword', function() use($app){
	$input = $app->request()->post();
    $mongo = new MongoClient ();
	$db = $mongo->people;
	$a = $db->peoples->insert($input);
	var_dump($a);
});

$app->post('/updatePeople', function() use($app){
	$input = $app->request()->post();
    $mongo = new MongoClient ();
	$db = $mongo->people;
	$a = $db->peoples->insert($input);
	var_dump($a);
});

$app->post('/updateAddress', function() use($app){
	$input = $app->request()->post();
    $mongo = new MongoClient ();
	$db = $mongo->people;
	$a = $db->peoples->insert($input);
	var_dump($a);
});

$app->post('/login', function() use($app){
	$input = $app->request()->post();
    var_dump($input);
});

$app->post('/searchPeople', function() use($app){
	$input = $app->request()->post();
    $mongo = new MongoClient ();
	$db = $mongo->people;
	$search['fName']= 'amit';
	$output = $db->peoples->findOne($search);
    var_dump($output);
});

$app->get('/about', function() use($app){
	echo "I am making this app for learning purpose";
});


$app->run();
?>