@extends('layout.sidebar')

@section('main')
    <div class="p-5 ">
        <a href="{{ route('addDataCity') }}" class="btn btn-primary mb-3">Add City Data</a>
        <div class="card shadow">
            <div class="card-body">
                <table id="myTable" class="table display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <Th>Action</Th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="">
                                            <a href="{{ route('editDataCity', $item->id) }}"
                                                class="btn btn-success me-2">Edit</a>
                                        </div>
                                        <form action="{{ route('deleteCity', $item->id) }}" method="POST" class="">
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Are you sure to delete this data?')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @endforeach


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
