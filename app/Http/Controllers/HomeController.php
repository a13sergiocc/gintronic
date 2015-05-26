<?php namespace App\Http\Controllers;

use View;
use Auth;
use Request;

use App\User;
use App\Service;

class HomeController extends Controller {

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
		// Current user (Model object), contracts and payments
		$user = User::findOrFail(Auth::user()->id);
		$userContracts = $user->contracts;
		$userPayments = $user->payments;

		$id = [];
		foreach ($userContracts as $key => $value) {
			$id[] = $value->id;
		}
		// Services with students
		$servicesWithContracts = Service::has('contracts')->get();

		// All available services
		$availableServices = Service::orderBy('name')->get();

		foreach ($availableServices as $key => $value) {
			if(in_array($value->id, $id))
				unset($availableServices[$key]);
		}

		return view('partials/home',
					[
						'user' => $user,
						'userContracts' => $userContracts,
						'userPayments' => $userPayments,
						'servicesWithContracts' => $servicesWithContracts,
						'availableServices' => $availableServices
					]);
	}

	public function postJoinService($id)
	{
		$user = User::find(Auth::user()->id);
		$user->contracts()->attach($id);

		return redirect('home');;
	}

	public function deleteQuitService($id)
	{
		$user = User::find(Auth::user()->id);
		$user->contracts()->detach($id);

		return redirect('home');;
	}

	public function postPayService($id)
	{
		$user = User::find(Auth::user()->id);
		$serviceFee = Service::find($id)->fee;
		$user->payments()->attach($id, ['fee' => $serviceFee]);

		return redirect('home');;
	}
}
