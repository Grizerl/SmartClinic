@extends('layouts.doctor')

@section('title', 'Панель адміністратора')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Панель адміністратора</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Користувачі</h3>
            <p>Кількість зареєстрованих користувачів: <strong></strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Прийоми</h3>
            <p>Заплановані прийоми: <strong></strong></p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-2">Лікарі</h3>
            <p>Усього лікарів: <strong></strong></p>
        </div>
    </div>
@endsection
