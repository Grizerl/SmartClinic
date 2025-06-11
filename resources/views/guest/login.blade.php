@extends('layouts.app')

@section('title', 'Вхід пацієнта')

@section('content')
<div class="form-container">
    <h2>Вхід для пацієнтів</h2>
    <form action="{{ route('guest.store') }}" method="post">
        @csrf

        <label for="phone">Номер телефону:</label>
        <input type="tel" id="phone" name="phone" placeholder="+380...">
        @error('phone')
            <div style="padding-bottom: 15px; color:red; font-size: 1rem; font-weight:600;">{{ $message }}</div>
        @enderror

        <label for="email">Електронна пошта:</label>
        <input type="email" id="email" name="email" placeholder="...@gmail.com">
        @error('email')
            <div style="padding-bottom: 15px; color:red; font-size: 1rem; font-weight:600;">{{ $message }}</div>
        @enderror

        <button type="submit">Увійти</button>
    </form>
</div>
@endsection
