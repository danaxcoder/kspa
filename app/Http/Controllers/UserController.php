<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
	
	public function add(Request $request) {
		$appID = intval($request->input('app_id'));
		$phone = $request->input('phone');
		$password = $request->input('password');
		DB::insert("INSERT INTO `account` (`app_id`, `phone`, `password`) VALUES (".$appID.", '".$phone."', '".$password."')");
	}
}