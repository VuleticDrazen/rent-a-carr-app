<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Location;
use App\Models\Reservation;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::query()->paginate(Reservation::PER_PAGE);
        //$cars = Car::where('broj_sjedista','<','7')->get();
        return view('reservations.index', ['reservations'=> $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(){

        $categories = Category::query();
        return view('reservations.search',['categories',$categories]);
    }

    public function create(Request $request)
    {
        $locations = Location::all();
        $equipments = Equipment::all();
        $datum1 =  Carbon::parse($request->datum_preuzimanja);
        $datum2 =  Carbon::parse($request->datum_vracanja);

        $length = $datum2->diffInDays($datum1);
        $car_cat_id = $request->category_id;


        $cars = Car::query()
            ->whereNotIn('id', function($query)use($datum1,$datum2){
                $query->from('reservations')
                    ->where('reservations.datum_preuzimanja',  '>=', $datum1)
                    ->where('reservations.datum_vracanja', '<=' ,$datum2)
                    ->select(['reservations.car_id']);
            })->get();


        return view('reservations.create',['cars'=>$cars,'car_cat_id'=>$car_cat_id, 'locations'=>$locations,'equipments'=>$equipments,'dateTake'=>$datum1,'dateBack'=>$datum2,'length'=>$length]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $car = Car::findOrFail($request->car_id);
        $price = $car->cijena_po_danu * $request->length;

        Reservation::create([

            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'datum_preuzimanja' => $request->dateTake,
            'datum_vracanja' => $request->dateBack,
            'lokacija_preuzimanja'=>$request->lokacija_preuzimanja,
            'lokacija_vracanja'=>$request->lokacija_vracanja,
            'dodatna_oprema'=>$request->dodatna_oprema,
            'cijena_rezervacije' => $price
        ])->save();
        return redirect('reservations/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {

        $reservation->delete();
        return redirect('reservations/');
    }
}
