@extends('layout.sidebar')

@section('main')
    <div class="p-5 ">
        <a href="{{ route('addDataMahasiswa') }}" class="btn btn-primary mb-3">Add Student Data</a>
        <div class="card shadow">
            <div class="card-body">
                <table id="myTable" class="table display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Name</th>
                            <th>Born Date</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Address</th>
                            <Th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->sex }}</td>
                                <td>{{ $item->city->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="">
                                            <a href="{{ route('editDataMahasiswa', $item->id) }}"
                                                class="btn btn-success me-2">Edit</a>
                                        </div>
                                        <form action="{{ route('deleteMahasiswa', $item->id) }}" method="POST" class="">
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Are you sure to delete this data?')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                dom: 'frtip'
            });
        });
    </script>
@endsection
