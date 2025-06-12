@extends('layouts.guest')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Запис на прийом</h2>
    <form action="{{ route('appointments.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="doctor_id" class="block font-semibold mb-1">Оберіть лікаря:</label>
            <select name="doctor_id" id="doctor_id" class="w-full border border-gray-300 rounded p-2">
                @foreach ($doctor as $doctors)
                    <option value="{{ $doctors->id }}">{{  $doctors->name }} — {{  $doctors->specialization }}</option>
                @endforeach
            </select>
            @error('doctor_id')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date_time" class="block font-semibold mb-1">Дата і час:</label>
            <input type="datetime-local" name="created_at" id="created_at"class="w-full border border-gray-300 rounded p-2">
            @error('created_at')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
         <div class="mb-4">
            <label for="service_id" class="block font-semibold mb-1">Оберіть послугу:</label>
            <select name="service_id" id="service_id" class="w-full border border-gray-300 rounded p-2">
                  @foreach ($service as $services)
                    <option value="{{ $services->id }}">{{  $services->name }} — {{  $services->price }} грн</option>
                @endforeach
            </select>
              @error('service_id')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Підтвердити запис
        </button>
    </form>
</div>
@endsection
