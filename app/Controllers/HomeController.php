<?php

namespace App\Controllers;

use \App\Models\Tps;

class HomeController extends BaseController
{
	public function index()
	{
		$tps = new Tps();
		$db = \Config\Database::connect();
		$user = $db->table('users')->get();
		$data_tps = [];
		$data_tps['desa'] = $tps->where('situasi', 6)->find();
		$data_tps['kecamatan'] = $tps->where('situasi', 5)->find();
		$data_tps['dinsos'] = $tps->where('situasi', 4)->find();
		$data_tps['provinsi'] = $tps->where('situasi', 3)->find();
		$data_tps['kementerian'] = $tps->where('situasi', 2)->find();
		return view('home/index', ['data_tps' => $data_tps]);
	}

	//--------------------------------------------------------------------

}