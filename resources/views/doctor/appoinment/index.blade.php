@extends('layouts.doctor')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Заявки до лікаря</h2>
</div>
<table class="w-full bg-white rounded shadow text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Ім'я пацієнта</th>
            <th class="p-3">Послуга</th>
            <th class="p-3">Статус</th>
            <th class="p-3">Дата заявки</th>
            <th class="p-3">Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appoinments as $appoinment)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $appoinment->user->name }}</td>
                <td class="p-3">{{ $appoinment->service->name }}</td>
                <td class="p-3">{{ $appoinment->status }}</td>
                <td class="p-3">{{ $appoinment->created_at }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('appoinment.edit', $appoinment->id) }}" class="text-blue-600 hover:underline">Редагувати</a>
                    <form action="{{ route('appoinment.destroy',$appoinment->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Видалити заявку?')">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $appoinments->links() }}
@endsection
