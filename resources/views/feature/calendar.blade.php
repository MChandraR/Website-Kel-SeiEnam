<link rel="stylesheet" href="{{asset('css/calendar.css')}}">
<div class="calendar-container">
    <header class="calendar-header">
        <p class="calendar-current-date"></p>
        <div class="calendar-navigation">
            <span id="calendar-prev" 
                    class="material-symbols-rounded">
                <
            </span>
            <span id="calendar-next" 
                    class="material-symbols-rounded">
                >
            </span>
        </div>
    </header>

    <div class="calendar-body">
        <ul class="calendar-weekdays">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="calendar-dates"></ul>
    </div>
</div>

<script src="{{asset('js/calendar.js')}}"></script>