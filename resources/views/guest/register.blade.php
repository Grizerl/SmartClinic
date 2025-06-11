@extends('layouts.app')

@section('title', 'Реєстрація пацієнтів')

@section('content')
    <div>
        <h2>Реєстрація</h2>
            <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name">ПІБ:</label>
                    <input id="name" name="name" type="text" placeholder="Петро Петренко Петрович">
                    @error('name')
                        <div style="padding-bottom: 15px; color:red; font-size: 1rem; font-weight:600;">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="phone">Номер телефону:</label>
                    <input id="phone" name="phone" type="tel" placeholder="+380...">
                    @error('phone')
                        <div style="padding-bottom: 15px; color:red; font-size: 1rem; font-weight:600;">{{ $message }}</div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="email">Електронна пошта:</label>
                    <input id="email" name="email" type="email" placeholder="...@gmail.com">
                    @error('email')
                        <div style="padding-bottom: 15px; color:red; font-size: 1rem; font-weight:600;">{{ $message }}</div>
                    @enderror
            </div>
                <button type="submit">Зареєструватися</button>
            </form>
    </div>
@endsection
