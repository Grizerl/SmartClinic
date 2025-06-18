@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Панель адміністратора</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Послуги компанії</h3>
            <p>Кількість зареєстрованих послуг: <strong>{{ $services }}</strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Прийоми клієнтів</h3>
            <p>Заплановані прийоми: <strong>{{ $receptions }}</strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Лікарі</h3>
            <p>Усього лікарів: <strong>{{ $doctors }}</strong></p>
        </div>
    </div>
@endsection
