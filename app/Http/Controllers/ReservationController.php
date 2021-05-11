<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
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
    public function create($id, Car $car)
    {
        return view('reservations.create')->with(
            [
                'id' => Car::findOrFail($id),
                'car' => $car::all()
            ]
        );
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
        $dateTakeCar = new \DateTime($request->datum_preuzimanja);
        $dateGetCarBack = new \DateTime($request->datum_vracanja);
        $dates = date_diff($dateTakeCar, $dateGetCarBack);
        $price = $car->cijena_po_danu*( $dates->format('%d'));

        Reservation::create([

            'user_id' => auth()->user()->id,
            'car_id' => $request->car_id,
            'datum_preuzimanja' => $request->datum_preuzimanja,
            'datum_vracanja' => $request->datum_vracanja,
            'lokacija_preuzimanja'=>$request->lokacija_preuzimanja,
            'lokacija_vracanja'=>$request->lokacija_preuzimanja,
            'dodatna_oprema'=>$request->dodatna_oprema,
            'cijena_rezervacije' => $price
        ]);
        return redirect()->route('users.profile', auth()->user()->id)->with([
            'success' => 'Rezervacija uspjesna'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
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
        //
    }
}
