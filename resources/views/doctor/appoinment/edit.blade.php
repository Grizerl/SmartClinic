@extends('layouts.doctor')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Змінити дані</h2>
    <form action="{{ route('appoinment.update',$appointment['id']) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="status" class="block font-semibold mb-1">Статус</label>
            <select name="status" id="status"  class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="scheduled" {{ old('status', $appointment->status) == 'scheduled' ? 'selected' : '' }}>scheduled</option>
                <option value="completed" {{ old('status', $appointment->status) == 'completed' ? 'selected' : '' }}>completed</option>
                <option value="cancelled" {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}>cancelled</option>
            </select>
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
