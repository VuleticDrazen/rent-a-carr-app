@extends('layouts.app')

@section('content')

    <div class="row my-4">
        <div class="card-body">
            <form action="create" method="get">
                @csrf
                <div class="form-group">
                    <label for="datum_preuzimanja">Datum preuzimanja</label>
                    <input type="date" name="datum_preuzimanja" id="" class="form-control" placeholder="Datum preuzimanja"
                           aria-describedby="helpId" />
                </div>

                <div class="form-group">
                    <label for="datum_vracanja">Datum vracanja</label>
                    <input type="date" name="datum_vracanja" id="" class="form-control" placeholder="Datum preuzimanja"
                           aria-describedby="helpId" />

                </div>

                <div class="form-group">
                    <label for="">Kategorija*</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->kategorija}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

@endsection
