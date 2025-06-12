@extends('layouts.guest')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Ласкаво просимо, {{ auth()->user()->name }}</h2>

    <div class="mb-6">
        <a href="{{ route('appointments.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Записатися на прийом
        </a>
    </div>

    <section class="mb-6">
        <h3 class="text-lg font-semibold border-b pb-2 mb-3">Майбутні прийоми</h3>
            @forelse($futureAppointment as $futureAppointments)
            <div class="p-4 mb-2 bg-gray-100 rounded border">
                <strong>Лікар:</strong> {{ $futureAppointments->doctor->name }}<br>
                <strong>Дата: {{ $futureAppointments->created_at }}</strong> 
            </div>
            @empty
            <p class="text-gray-500">Немає запланованих прийомів.</p>
        @endforelse
       <div>
            {{ $futureAppointment->links() }}
        </div> 
    </section>

    <section class="mb-6">
        <h3 class="text-lg font-semibold border-b pb-2 mb-3">Минулі прийоми</h3>
            @forelse($pastAppointment as $pastAppointments)
            <div class="p-4 mb-2 bg-gray-50 border rounded">
                <strong>Лікар:</strong> {{ $pastAppointments->doctor->name }} <br>
                <strong>Дата:</strong> {{ $pastAppointments->created_at }}
            </div>
            @empty
            <p class="text-gray-500">Немає минулих прийомів.</p>
        @endforelse
         <div>
            {{ $pastAppointment->links() }}
        </div> 
    </section>

    <section>
        <h3 class="text-lg font-semibold border-b pb-2 mb-3">Медичні записи</h3>
            @forelse($medicalRecord as $medicalRecords)
            <div class="p-4 mb-2 bg-white border-l-4 border-blue-500 shadow-sm">
                <strong>Лікар:</strong> {{ $medicalRecords->doctor->name }} <br>
                <strong>Спеціалізація:</strong> {{ $medicalRecords->doctor->specialization }} <br>
                <strong>Опис:</strong> {{ $medicalRecords->description }} <br>
                <strong>Дата:</strong> {{ $medicalRecords->created_at }}
            </div>
       @empty
            <p class="text-gray-500">Медичних записів ще немає.</p>
        @endforelse
         <div>
            {{ $medicalRecord->links() }}
        </div> 
    </section>
@endsection
