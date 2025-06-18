@extends('layouts.doctor')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Додати запис</h2>
    <form action="{{ route('medical_record.store') }}" method="post">
        @csrf

        <div class="mb-4">
    <label for="user_id" class="block font-semibold mb-1">Ім'я клієнта</label>
    <select name="user_id" id="user_id"
        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option value="">Усі клієнти</option>
        @foreach($client as $clients)
          
                <option value="{{ $clients->id }}">{{ $clients->name }}</option>
           
        @endforeach
    </select>
    @error('user_name')
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="description" class="block font-semibold mb-1">Опис</label>
    <input type="text" id="description" name="description"
        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
    @error('description')
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Додати запис
        </button>
    </form>
</div>
@endsection
