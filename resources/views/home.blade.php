@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper_top_button_content">
                <a href="{{ route('vacation.create') }}"  class="btn btn-primary btn-sm">Добавить запись</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО сотрудника</th>
                            <th scope="col">Дата отпуска</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($vacations)

                            @foreach($vacations as $vacation)

                                <tr>
                                    <th scope="row">{{$vacation->id}}</th>
                                    <td>{{$vacation->employee}}</td>
                                    <td>{{date('d.m.Y', strtotime($vacation->date_start))}} - {{date('d.m.Y', strtotime($vacation->date_end))}}</td>
                                    @if($name_user == $vacation->employee)
                                        @if($vacation->confirmed == '1')
                                            <td class="no_active @if($admin) admin @endif "><a href="{{route('vacation.edit',$vacation->id)}}">Подтверждено</a></td>
                                        @else
                                            <td class="action ">
                                            <a href="{{route('vacation.edit',$vacation->id)}}">Изменить</a>
                                            <form action="{{route('vacation.destroy',$vacation->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Удалить">
                                            </form>
                                            </td>
                                            @endif
                                    @else
                                        @if($vacation->confirmed == '0')
                                            <td class="no_active @if($admin) admin @endif "><a href="{{route('vacation.edit',$vacation->id)}}">Не подтверждено</a></td>
                                        @else
                                            <td class="no_active @if($admin) admin @endif "><a href="{{route('vacation.edit',$vacation->id)}}">Подтверждено</a></td>
                                        @endif
                                    @endif
                                </tr>

                            @endforeach

                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
