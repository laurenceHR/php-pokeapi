<?php
namespace App\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller{ 
	public function toJson($data){
		header('Content-type: application/json');
		echo json_encode($data, JSON_PRETTY_PRINT);
		exit;
	}
}