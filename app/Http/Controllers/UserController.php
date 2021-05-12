<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->paginate(User::PER_PAGE);

        return view('users.index', ['users'=> $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'drzava_id'=>$request->drzava_id,
            'broj_pasosa'=>$request->broj_pasosa,
            'email'=>$request->email,
            'broj_telefona'=>$request->broj_telefona,
            'dodante_napomene'=>$request->dodatne_napomene,

        ]);
        return redirect('/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', [ 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $country = Country::all();
        return view('users.edit', ['user'=>$user,'countries'=>$country]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->update([
            'name'=>$request->name,
            'drzava_id'=>$request->drzava_id,
            'broj_pasosa'=>$request->broj_pasosa,
            'email'=>$request->email,
            'broj_telefona'=>$request->broj_telefona,
            'dodante_napomene'=>$request->dodatne_napomene,

        ]);
        return redirect('/dashboard/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/dashboard');
    }
}
