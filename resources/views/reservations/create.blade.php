@extends('layouts.app')

@section('content')

    <div class="row my-4">
        <div class="card-body">
            <form action="{{ route('reservations.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="dateL">Date Location</label>
                    <input type="date" name="datum_preuzimanja" id="" class="form-control" placeholder="Date de debut..."
                           aria-describedby="helpId" />
                </div>


                <div class="form-group">
                    <label for="dateR">Date Retour</label>
                    <input type="date" name="datum_vracanja" id="" class="form-control" placeholder="Date de Fin..."
                           aria-describedby="helpId" />

                </div>
                <input type="hidden" name="car_id" value="{{$car->random()->id}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

@endsection
