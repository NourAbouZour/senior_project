<div id="garage" class="category">
    <h2>Garage Control Panel</h2>
    <div class="feature">
        <h3>Garage Door</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleGarageDoor(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="garageDoorStatus">Closed</span>
    </div>
    <div class="feature">
        <h3>Car Locator</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleCarLocator(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="carLocatorStatus">Inactive</span>
    </div>
    <div class="feature">
        <h3>Security System</h3>
        <label class="switch">
            <input type="checkbox" onchange="toggleSecurity(this.checked)">
            <span class="slider"></span>
        </label>
        <span id="securityStatus">Armed</span>
    </div>
</div>
