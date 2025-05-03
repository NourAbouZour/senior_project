<div class="filter">
    <h3>Filter Services</h3>
    <ul>
        <li><input type="checkbox" id="all" checked> <label for="all">All</label></li>
        <li><input type="checkbox" id="microcontroller"> <label for="microcontroller">Microcontrollers & Modules</label></li>
        <li><input type="checkbox" id="sensors"> <label for="sensors">Sensors</label></li>
        <li><input type="checkbox" id="motors"> <label for="motors">Actuators & Motors</label></li>
        <li><input type="checkbox" id="sac"> <label for="sac">Security & Access Control</label></li>
        <li><input type="checkbox" id="electrical"> <label for="electrical">Electrical Components</label></li>
        <li><input type="checkbox" id="visual"> <label for="visual">Visual Components</label></li>
        <li><input type="checkbox" id="power"> <label for="power">Power & Energy</label></li>
    </ul>
    <h3>Filter by Price</h3>
    <div class="money-filter">
        <input type="range" min="0" max="10" value="10" id="priceRange">
        <p>Price: $<span id="priceValue">10</span></p>
    </div>

    <!-- (Optional) your Apply button -->
    <button id="applyFilter" type="button" class="filterbutton">Apply Filter</button>
</div>
