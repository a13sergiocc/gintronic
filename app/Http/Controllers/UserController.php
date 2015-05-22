<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

use Redirect;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['status'=>'ok','data'=>User::all()], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user=User::find($id);

		return response()->json(['status'=>'ok','data'=>$user],200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user=User::find($id);

		if ($user== null)
			return Redirect::to('home');

		return view('partials/edit', ['user'=>$user]);
	}

	/**
	 * Update user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$user = User::find($id);

		if ($request->input('name'))
			$user->name=$request->input('name');
		if ($request->input('surname'))
			$user->surname=$request->input('surname');
		if ($request->input('birthday'))
			$user->birthday=$request->input('birthday');
		if ($request->input('email'))
			$user->email=$request->input('email');
		if ($request->input('address'))
			$user->address=$request->input('address');
		if ($request->input('telephone'))
			$user->email=$request->input('telephone');
		if ($request->input('password'))
			$user->password=bcrypt($request->input('password'));

		$user->save();

		return Redirect::to('/home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		$user->delete();

		return Redirect::to('/');
	}

}
