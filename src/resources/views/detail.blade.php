@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<main>
    <body>
        <div class="container">
            <div class="restaurant-detail">
                <a href="{{ url()->previous() }}" class="back-button">&lt; 戻る</a>
                <h1>{{ $restaurant->name }}</h1>
                <img src="{{ $restaurant->photo }}" alt="{{ $restaurant->name }}" class="restaurant-image">
                <div class="restaurant-info">
                    <p>#{{ $restaurant->area->area }} #{{ $restaurant->genre->genre }}</p>
                    <p>{{ $restaurant->detail }}</p>
                </div>
            </div>
            <div class="reservation-form">
                <h2>予約</h2>
                <form action="{{ route('reserve') }}" method="POST">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{ $restaurant->id }}">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" required>
                    <label for="number">Number</label>
                    <select id="number" name="number" required>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}人</option>
                        @endfor
                    </select>
                    <div class="summary">
                        <p>Shop: {{ $restaurant->name }}</p>
                        <p>Date: <span id="summary-date"></span></p>
                        <p>Time: <span id="summary-time"></span></p>
                        <p>Number: <span id="summary-number"></span></p>
                    </div>
                    <button type="submit" class="reserve-button">予約する</button>
                </form>
            </div>
        </div>
    </body>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date');
    const timeInput = document.getElementById('time');
    const numberSelect = document.getElementById('number');
    
    dateInput.addEventListener('change', updateSummary);
    timeInput.addEventListener('change', updateSummary);
    numberSelect.addEventListener('change', updateSummary);

    function updateSummary() {
        document.getElementById('summary-date').textContent = dateInput.value;
        document.getElementById('summary-time').textContent = timeInput.value;
        document.getElementById('summary-number').textContent = numberSelect.value;
    }
});
</script>
@endsection
