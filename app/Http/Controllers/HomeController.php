<?php namespace App\Http\Controllers;

use View;
use Auth;
use Request;

use App\User;
use App\Service;

class HomeController extends Controller {

	// Current user
	private $current;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->current = User::find(Auth::user()->id);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		// Current user services
		$currentContracts = $this->current->contracts;

		// Services with students
		$contracts = Service::has('contracts')->get();

		// All available services
		$services = Service::orderBy('name')->get();

		return view('partials/home',
					[
						'user' => $this->current,
						'contracts' => $contracts,
						'services' => $services,
						'currentContracts' => $currentContracts
					]);
	}

	public function joinService(Request $request)
	{
		\DB::table('contracts')
			->insert([
						'user_id' => $this->current->id,
						'service_id' => Request::input('service_id')
					]);

		return redirect('home');;
	}

	public function quitService()
	{
		\DB::table('contracts')
			->where('user_id', '=', $this->current->id)
			->where('service_id', '=', Request::input('service_id'))
			->delete();

		return redirect('home');;
	}

	public function payService()
	{
		// Pagar un servicio
		// Cogemos el id de current usuario
		// Cogemos el id de servicio
		// Cogemos el precio relativo al servicio
		// Creamos un registro nuevo con esos 3 campos
	}
}
