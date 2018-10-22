<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User_adds;
use App\Models\Login_log;
use Illuminate\Http\Request;

class NewController extends Controller
{
	public function index()
	{
//		$data=DB::select('select * from new');
//		var_dump($data);
//		return view('index',['data'=>$data]);
	}
	public function add(Request $request)
	{
		$memberUserinfo = $request -> input();

		if( $memberUserinfo ){
			unset($memberUserinfo['_token']);
			User_adds::memberUserAdd($memberUserinfo);
		}
		return view('add');
	}
}


?>