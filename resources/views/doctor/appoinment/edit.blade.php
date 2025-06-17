@extends('layouts.doctor')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Змінити дані</h2>
    <form action="{{ route('appoinment.update',$appointment['id']) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="status" class="block font-semibold mb-1">Статус</label>
            <input type="text" id="status" name="status" placeholder="Completed or Cancelled"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('status')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Редугувати
        </button>
    </form>
</div>
@endsection
