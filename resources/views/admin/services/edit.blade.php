@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Змінити послугу</h2>
    <form action="{{ route('services.update', $service['id']) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Назва</label>
            <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold mb-1">Опис</label>
            <input type="text" id="description" name="description" value="{{ old('description', $service->description) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('description')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Ціна</label>
            <input type="number" id="phone" name="price" value="{{ old('price', $service->price) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('price')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Редугувати дані
        </button>
    </form>
</div>
@endsection
