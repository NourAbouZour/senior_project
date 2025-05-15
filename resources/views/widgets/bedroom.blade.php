<div id="bedroom" class="category">
    <h2>Bedroom Control Panel</h2>
    <div class="feature">
        <h3>Smart Blinds</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleBlinds(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="blindsStatus">Closed</span>
    </div>
    <div class="feature">
        <h3>Sleep Mode</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleSleepMode(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="sleepModeStatus">Off</span>
    </div>
    <div class="feature">
        <h3>Wake Up Alarm</h3>
        <div class="input-group">
            <label for="alarmTimeInput">Set Alarm (date &amp; time):</label>
            <input type="datetime-local" id="alarmTimeInput">
        </div>
        <label class="switch">
            <input type="checkbox" onchange="toggleWakeUpAlarm(this.checked)" id="wakeUpSwitch">
            <span class="slider"></span>
        </label>
        <span id="wakeUpStatus">Off</span>
    </div>
    <audio id="bedroomAlarmSound" src="{{ asset('audio/alarm2.wav') }}" preload="auto"></audio>
</div>
