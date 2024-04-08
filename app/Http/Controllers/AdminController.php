<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
	
	public function login(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');
		$admins = DB::select("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."'");
		if (sizeof($admins) > 0) {
			echo json_encode(array(
				'response_code' => 0,
				'data' => array(
					'admin' => $admins[0]
				)
			));
		} else {
			echo json_encode(array(
				'response_code' => -1
			));
		}
	}
	
	public function get_apps(Request $request) {
		$apps = DB::select("SELECT * FROM `app` ORDER BY `name`");
		return array(
			'response_code' => 0,
			'data' => array(
				'apps' => $apps
			)
		);
	}
	
	public function search_app(Request $request) {
		$query = $request->input('query');
		$apps = DB::select("SELECT * FROM `app` WHERE `name` LIKE '%".$query."%' ORDER BY `name`");
		return array(
			'response_code' => 0,
			'data' => array(
				'apps' => $apps
			)
		);
	}
	
	public function get_accounts(Request $request) {
		$appID = intval($request->input('app_id'));
		$accounts = DB::select("SELECT * FROM `account` WHERE `app_id`=".$appID." ORDER BY `date` DESC");
		return array(
			'response_code' => 0,
			'data' => array(
				'accounts' => $accounts
			)
		);
	}
	
	public function search_account(Request $request) {
		$query = $request->input('query');
		$accounts = DB::select("SELECT * FROM `account` WHERE `phone` LIKE '%".$query."%' ORDER BY `date` DESC");
		return array(
			'response_code' => 0,
			'data' => array(
				'accounts' => $accounts
			)
		);
	}
	
	public function get_admins(Request $request) {
		$admins = DB::select("SELECT * FROM `admin` ORDER BY `name`");
		return array(
			'response_code' => 0,
			'data' => array(
				'admins' => $admins
			)
		);
	}
	
	public function search_admin(Request $request) {
		$query = $request->input('query');
		$admins = DB::select("SELECT * FROM `admin` WHERE `name` LIKE '%".$query."%' OR `email` LIKE '%".$query."%' ORDER BY `name`");
		return array(
			'response_code' => 0,
			'data' => array(
				'admins' => $admins
			)
		);
	}
	
	public function add_admin(Request $request) {
		$name = $request->input('name');
		$email = $request->input('email');
		$password = $request->input('password');
		DB::insert("INSERT INTO `admin` (`name`, `email`, `password`) VALUES ('".$name."', '".$email."', '".$password."')");
	}
	
	public function delete_admin(Request $request) {
		$id = intval($request->input('id'));
		DB::select("DELETE FROM `admin` WHERE `id`=".$id);
	}
	
	public function update_admin(Request $request) {
		$id = intval($request->input('id'));
		$name = $request->input('name');
		$password = $request->input('password');
		DB::insert("UPDATE `admin` SET `name`='".$name."', `password`='".$password."' WHERE `id`=".$id);
	}
	
	public function delete_account(Request $request) {
		$id = intval($request->input('id'));
		DB::select("DELETE FROM `account` WHERE `id`=".$id);
	}
}