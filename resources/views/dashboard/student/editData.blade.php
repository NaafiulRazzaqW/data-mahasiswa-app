@extends('layout.sidebar')

@section('main')
    <div class="p-5 d-flex justify-content-center">
        <div class="card shadow" style="width: 70%">
            <div class="card-body">
                <h5 class="card-title fs-4"><b>Form Edit Data Student</b></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary mb-3">all data must be filled in correctly!</h6>
                @if (session()->get('errors'))
                    <div class="alert alert-danger mb-3" role="alert">
                        {{ session()->get('errors')->first() }}
                    </div>
                @endif

                <form action="{{ route('submitEditDataMahasiswa', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nim"
                            aria-describedby="emailHelp" required value="{{ $data->nim }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NAME</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            aria-describedby="emailHelp" required value="{{ $data->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">BORN DATE</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="date"
                            aria-describedby="emailHelp" required value="{{ $data->date_of_birth }}">
                    </div>
                    <label for="exampleInputEmail1" class="form-label">GENDER</label>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <option value="male" {{ $data->sex == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female"{{ $data->sex == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CITY</label>
                        <select class="form-select" aria-label="Default select example" name="city">

                            @foreach ($city as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $data->city->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ADDRESS</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                            aria-describedby="emailHelp" required value="{{ $data->address }}">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('GetDataMahasiswa') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
