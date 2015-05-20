<?php namespace App\Http\Controllers;

use View;
use Auth;

use App\User;
use App\Service;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$current = User::find(Auth::user()->id);
		$currentContracts = $current->contracts()->get();

		$contracts = Service::has('contracts')->get();
		$services = Service::orderBy('name')->get();

		return view('partials/home',
					[
						'user' => $current,
						'contracts' => $contracts,
						'services' => $services,
						'currentContracts' => $currentContracts
					]);
	}

}
