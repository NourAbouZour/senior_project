<div id="livingRoom" class="category">
    <h2>Living Room Control Panel</h2>
    <div class="feature">
        <h3>Smart Lighting</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleLivingRoomLights(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="livingRoomLightsStatus">Off</span>
    </div>
    <div class="feature">
        <h3>Movie Mode</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleMovieMode(this.checked)" id="movieModeSwitch">
            <span class="slider"></span>
        </label>
        <span id="movieModeStatus">Inactive</span>
    </div>
    <div class="feature">
        <h3>Thermostat</h3>
        <label for="tempRange">Set Temperature:</label>
        <input type="range" id="tempRange" min="16" max="30" value="22" onchange="setTemperature(this.value)">
        <span id="tempValue">22°C</span>
    </div>
</div>
