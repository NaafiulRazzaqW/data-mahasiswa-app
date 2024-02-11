@extends('layout.sidebar')

@section('main')
    <div class="p-5 d-flex justify-content-center">
        <div class="card shadow" style="width: 70%">
            <div class="card-body">
                <h5 class="card-title fs-4"><b>Form Add Data City</b></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary mb-3">all data must be filled in correctly!</h6>
                <form action="{{ route('submitEditDataCity', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NAME</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('GetDataCity') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
