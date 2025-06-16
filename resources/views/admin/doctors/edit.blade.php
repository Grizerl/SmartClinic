@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Редагувати лікаря</h2>
    <form action="{{ route('doctors.update', $doctors['id']) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Ім'я</label>
            <input type="text" id="name" name="name" value="{{ old('name', $doctors->name) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="specialization" class="block font-semibold mb-1">Спеціалізація</label>
            <input type="text" id="specialization" name="specialization" value="{{ old('specialization', $doctors->specialization) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('specialization')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block font-semibold mb-1">Телефон</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $doctors->phone) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('phone')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $doctors->email) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Змінити дані
        </button>
    </form>
</div>
@endsection
