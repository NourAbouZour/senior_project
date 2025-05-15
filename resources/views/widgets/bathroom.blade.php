<div id="bathroom" class="category">
    <h2>Bathroom Control Panel</h2>
    <div class="feature">
        <h3>Shower Heater Timer</h3>
        <div class="input-group">
            <label for="showerMinutes">Minutes:</label>
            <input type="number" id="showerMinutes" min="0" value="0">
            <label for="showerSeconds">Seconds:</label>
            <input type="number" id="showerSeconds" min="0" max="59" value="8">
        </div>
        <label class="switch">
            <input type="checkbox" onchange="toggleShowerTimer(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="showerTimerDisplay">00:00</span>
    </div>
    <div class="feature">
        <h3>Mirror Defogger</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleDefogger(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="defoggerStatus">Off</span>
    </div>
    <div class="feature">
        <h3>Ambient Music</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleBathroomMusic(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="bathroomMusicStatus">Off</span>
    </div>
    <audio id="bathroomAlarmSound" src="{{ asset('audio/alarm2.wav') }}" preload="auto"></audio>
    <audio id="bathroomMusicAudio" src="{{ asset('audio/music.mp3') }}" preload="auto" loop></audio>
</div>
