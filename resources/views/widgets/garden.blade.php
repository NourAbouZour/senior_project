<div id="garden" class="category active">
    <h2>Garden Control Panel</h2>
    <div class="feature">
        <h3>Sprinkler System</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleSprinklers(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="sprinklerStatus">Off</span>
    </div>
    <div class="feature">
        <h3>Garden Lights</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleGardenLights(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="gardenLightsStatus">Off</span>
    </div>
    <div class="feature">
        <h3>Soil Moisture Sensor</h3>
        <button onclick="checkSoilMoisture()">Check Moisture</button>
        <span id="soilMoistureStatus">N/A</span>
    </div>
</div>
