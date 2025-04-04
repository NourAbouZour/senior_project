<div class="product-description">
    <h1 id="product-name"></h1>
    <p id="product-desc"></p>
    <strong><p id="product-price"></p></strong>

    <div class="product-options">
        <!-- Color Selection -->
        <div class="color-selection">
            <h2>Select Color</h2>
            <div class="color-options">
                <span class="color-swatch" style="background-color: red;" onclick="selectColor('red')"></span>
                <span class="color-swatch" style="background-color: blue;" onclick="selectColor('blue')"></span>
                <span class="color-swatch" style="background-color: green;" onclick="selectColor('green')"></span>
            </div>
        </div>

        <!-- Rating Section -->
        <div class="rating-section">
            <h2>Rate this product</h2>
            <div class="rating-stars">
                <span class="star" onclick="setRating(1)">&#9734;</span>
                <span class="star" onclick="setRating(2)">&#9734;</span>
                <span class="star" onclick="setRating(3)">&#9734;</span>
                <span class="star" onclick="setRating(4)">&#9734;</span>
                <span class="star" onclick="setRating(5)">&#9734;</span>
            </div>
            <p id="user-rating"></p>
        </div>
    </div>

    <button onclick="goBack()">Back</button>
    <button onclick="addToCart()">Add to Cart</button>
</div>
