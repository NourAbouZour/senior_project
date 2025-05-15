
<div id="kitchen" class="category">
    <h2>Kitchen Control Panel</h2>
    <div class="feature">
        <h3>Oven Timer</h3>
        <div class="input-group">
            <label for="ovenMinutes">Minutes:</label>
            <input type="number" id="ovenMinutes" min="0" value="0">
            <label for="ovenSeconds">Seconds:</label>
            <input type="number" id="ovenSeconds" min="0" max="59" value="10">
        </div>
        <label class="switch">
            <input type="checkbox" onchange="toggleOvenTimer(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="ovenTimerDisplay">00:00</span>
    </div>
    <div class="feature">
        <h3>Microwave Timer</h3>
        <div class="input-group">
            <label for="microMinutes">Minutes:</label>
            <input type="number" id="microMinutes" min="0" value="0">
            <label for="microSeconds">Seconds:</label>
            <input type="number" id="microSeconds" min="0" max="59" value="5">
        </div>
        <label class="switch">
            <input type="checkbox" onchange="toggleMicrowave(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="microwaveTimerDisplay">00:00</span>
    </div>
    <div class="feature">
        <h3>Fridge Temperature</h3>
        <label for="fridgeTempSlider">Set Temperature:</label>
        <input type="range" id="fridgeTempSlider" min="2" max="8" step="0.1" value="4" onchange="updateFridgeTemp(this.value)">
        <span id="fridgeTempDisplay">4°C</span>
    </div>
    <audio id="ovenAlarmSound" src="{{ asset('audio/alarm2.wav') }}" preload="auto"></audio>
    <audio id="microwaveAlarmSound" src="{{ asset('audio/alarm2.wav') }}" preload="auto"></audio>
</div>
