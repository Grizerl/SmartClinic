@extends('layouts.doctor')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Панель для працівника {{ auth()->user()->name }} </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Послуги</h3>
            <p>Кількість зареєстрованих послуг в закладі: <strong>{{ $favor }}</strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Прийоми</h3>
            <p>Заплановані прийоми: <strong>{{ $appoinment }}</strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Медичні записи пацієнтів</h3>
            <p>Усього записів: <strong>{{ $records }}</strong></p>
        </div>
    </div>
@endsection
