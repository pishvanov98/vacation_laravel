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

            <form class="col-md-8" method="post" action="{{route('vacation.update',$vacation->id)}}">
                @csrf
                @method('PATCH')
                <label for="startDate">Дата начала отпуска</label>
                <input id="startDate" value="{{$vacation->date_start}}" name="startDate" class="form-control" type="date" />
                <label for="endDate">Дата конца отпуска</label>
                <input id="endDate" value="{{$vacation->date_end}}" name="endDate" class="form-control" type="date" />
                    <div class="col-auto @if($admin)  admin_edit @endif ">
                        <button type="submit" class="btn btn-primary mb-3 mt-2">Изменить</button>
                        @if($admin)
                            <button type="submit" name="submit_admin" value = "submit_admin" class="btn btn-primary mb-3 mt-2"> @if($vacation->confirmed == '0') Подтвердить @else Убрать подтверждение  @endif</button>
                        @endif
                    </div>
            </form>


        </div>
    </div>
@endsection
