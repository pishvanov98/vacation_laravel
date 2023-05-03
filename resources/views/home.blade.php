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
                        <tr>
                            <th scope="row">1</th>
                            <td>Пишванов Никита Сергеевич</td>
                            <td>07.03.2022-14.03.2022</td>
                            <td class="action"><a href="#">Изменить</a><a href="#">Удалить</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Пишванов Никита Сергеевич</td>
                            <td>10.03.2022-14.03.2022</td>
                            <td class="action"><a href="#">Изменить</a><a href="#">Удалить</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
