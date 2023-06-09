@extends('layouts.app')
@section('content')

    @push('js')
        <script src="{{ asset('js/jquery-3.6.4.min.js') }}" ></script>
        <script src="{{ asset('js/moment.js') }}" ></script>
        <script src="{{ asset('js/daterangepicker.js') }}" ></script>
    @endpush

    <div class="container">
        <div class="row justify-content-center">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="col-md-8" method="post" action="{{route('vacation.store')}}">
                @csrf
                <label for="startDate">Дата начала отпуска</label>
                <input id="startDate" name="startDate" class="form-control" type="date" />
                <label for="endDate">Дата конца отпуска</label>
                <input id="endDate" name="endDate" class="form-control" type="date" />
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3 mt-2">Сохранить</button>
                </div>
            </form>


        </div>
    </div>
@endsection
