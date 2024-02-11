@extends('layout.sidebar')

@section('main')
    <div class="p-5 ">
        <a href="{{ route('addDataMahasiswa') }}" class="btn btn-primary mb-3">Add Student Data</a>
        <a href="{{ route('export_excel') }}" class="btn btn-success mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64"/>
          </svg></a>
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
                                <td class="">{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->sex }}</td>
                                <td>{{ $item->city->name }}</td>
                                <td>{{ Str::length($item->address) > 10 ? substr($item->address, 0, 10) . '...' : $item->address }}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <div id="modal">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail-{{ $item->id }}">
                                                Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="detail-{{$item->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Information
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput" class="form-label">City</label>
                                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{$item->city->name}}" disabled>
                                                              </div>
                                                              <div class="mb-3">
                                                                <label for="disabledTextInput" class="form-label">Address</label>
                                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{$item->address}}" disabled>
                                                              </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <a href="{{ route('editDataMahasiswa', $item->id) }}"
                                                class="btn btn-success">Edit</a>
                                        </div>
                                        <form action="{{ route('deleteMahasiswa', $item->id) }}" method="POST"
                                            class="">
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
