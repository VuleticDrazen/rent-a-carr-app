<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::query()->paginate(Car::PER_PAGE);

        return view('cars.index', ['cars'=> $cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('cars.new', ['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {


        $image_path = 'storage/' . $request->file('fotografija')->store('fotografije');
        Car::create([
            'marka'=>$request->marka,
            'model'=>$request->model,
            'godina_proizvodnje'=>$request->godina_proizvodnje,
            'registarski_broj'=>$request->registarski_broj,
            'broj_sjedista'=>$request->broj_sjedista,
            'cijena_po_danu'=>$request->cijena_po_danu,
            'dodatne_napomene'=>$request->dodatne_napomene,
            'kategorija_id'=>$request->category_id,
            'fotografija'=>$image_path,
        ]);
        return redirect('/cars/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

        return view('cars.show', [ 'car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $category = Category::all();
        return view('cars.edit', [ 'car'=>$car,'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {

        $image_pat = 'storage/' . $request->file('fotografija')->store('fotografije');

        $car->update([
            'marka'=>$request->marka,
            'model'=>$request->model,
            'godina_proizvodnje'=>$request->godina_proizvodnje,
            'registarski_broj'=>$request->registarski_broj,
            'broj_sjedista'=>$request->broj_sjedista,
            'cijena_po_danu'=>$request->cijena_po_danu,
            'dodatne_napomene'=>$request->dodatne_napomene,
            'kategorija_id'=>$request->category_id,
            'fotografija'=>$image_pat,
        ]);
        return redirect('/cars/'.$car->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('cars/');
    }
}
