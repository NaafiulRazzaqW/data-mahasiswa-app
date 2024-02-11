@extends('layout.sidebar')
@section('main')
    <div class="d-flex justify-content-center gap-3 pt-3 ps-5">
        <div class="shadow card h-100" style="width: 1100px">
            <div class="d-flex gap-2 card-body border border-primary align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                    class="bi bi-person-standing" viewBox="0 0 16 16">
                    <path
                        d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0" />
                </svg>
                <div class="d-flex-column">
                    <h5 class="fw-bold card-title">Male Students</h5>
                    <p class="card-text fw-semibold">{{ $data[0] }}</p>
                </div>

            </div>
        </div>
        <div class="shadow card h-100" style="width: 1100px">
            <div class="d-flex gap-2 card-body border border-danger-subtle align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                    class="bi bi-person-standing-dress" viewBox="0 0 16 16">
                    <path
                        d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z" />
                </svg>
                <div class="d-flex-column">
                    <h5 class="fw-bold card-title">Female Students</h5>
                    <p class="card-text fw-semibold">{{ $data[1] }}</p>
                </div>

            </div>
        </div>
        <div class="shadow card h-100" style="width: 1100px">
            <div class="d-flex gap-2 card-body border border-success align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <div class="d-flex-column">
                    <h5 class="fw-bold card-title">Total Students</h5>
                    <p class="card-text fw-semibold">{{ array_sum($data) }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-3 pt-3  ps-5">
        <div class="shadow card" style="width: max-content">
            <div class="card-body">
                {!! $studentfromCity->container() !!}
            </div>
        </div>
        <div class="card" style="width: max-content">
            <div class="card-body">
                {!! $studentfromGender->container() !!}
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center gap-3 pt-3 ps-5">
        <div class="shadow card " style="width: max-content">
            <div class="card-body">
                {!! $studentfromBornYear->container() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ $studentfromCity->cdn() }}"></script>
    <script src="{{ $studentfromGender->cdn() }}"></script>
    <script src="{{ $studentfromBornYear->cdn() }}"></script>
    {{ $studentfromCity->script() }}
    {{ $studentfromGender->script() }}
    {{ $studentfromBornYear->script() }}
@endsection
