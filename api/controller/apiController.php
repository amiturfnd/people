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
    $DbConn = new DbConn();
    try {
    	$sql1 = "INSERT INTO users (email, reg_date) VALUES ('amit5@people.com', ".time().")";
    	$DbConn->conn->beginTransaction();
    	$DbConn->conn->query($sql);
    	$sql2 = "INSERT INTO profile (user_id, f_name, l_name, gender, status, dob, mobile, occupation, last_modified) VALUES ('amit5@people.com', ".time().")";
    	mysqli_insert_id($DbConn->conn);
    } catch (Exception $e) {
	    $DbConn->conn->rollback();
	}
	var_dump($a);
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