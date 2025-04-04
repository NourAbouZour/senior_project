// Sample array of products with details
const products = [
    {
        id: "1",
        name: "Arduino Central System",
        description: "This central system is built around the reliable Arduino Uno platform. It provides a powerful and flexible base for integrating sensors, actuators, and modules into your projects. Ideal for beginners and experts alike, it simplifies complex setups and enhances project performance.",
        price: "5$",
        image: "../images/arduino uno.png"
    },
    {
        id: "2",
        name: "High-Quality Wires",
        description: "These high-quality wires offer 50 meters of durable, flexible connectivity, ensuring reliable connections for all your electronic projects. Perfect for both prototyping and permanent installations, they deliver consistent performance and ease of use.",
        price: "8$",
        image: "../images/wires.png"
    },
    {
        id: "3",
        name: "LED Lighting Kit",
        description: "This LED lighting kit includes energy-efficient LED lights designed to brighten your projects with minimal power consumption. Their long lifespan and high brightness make them ideal for creative lighting solutions and decorative applications.",
        price: "2$",
        image: "../images/ledlights.png"
    },
    {
        id: "4",
        name: "RFID Door Lock",
        description: "Secure your home or office with this advanced RFID door lock. It utilizes state-of-the-art RFID technology to provide keyless entry through a smart card, ensuring that only authorized users can access your property. Its robust design and reliable performance make it a perfect addition to any security system.",
        price: "12$",
        image: "../images/rfid.png"
    },
    {
        id: "5",
        name: "Wireless Control System",
        description: "Experience seamless connectivity with this wireless control system powered by the ESP platform. It offers reliable wireless communication to integrate and control various devices in your projects, making it ideal for smart home applications and IoT solutions.",
        price: "8$",
        image: "../images/esp.png"
    },
    {
        id: "6",
        name: "Compact MG-90 Motor",
        description: "This compact MG-90 motor is engineered for precision and efficiency in small-scale applications. It delivers consistent torque and speed, making it suitable for robotics, automation, and various DIY projects. Its durable construction ensures long-lasting performance even under demanding conditions.",
        price: "10$",
        image: "../images/motor.png"
    },
    {
        id: "7",
        name: "Advanced Motion Sensor",
        description: "Enhance your security and automation systems with this advanced motion sensor. Designed to detect even subtle movements, it provides reliable alerts and can trigger other connected devices. Ideal for home security, lighting control, and energy management solutions.",
        price: "5$",
        image: "../images/motion sensor.png"
    },
    {
        id: "8",
        name: "RFID Key Card",
        description: "This RFID key card offers a convenient and secure method for access control. Compact and easy to use, it integrates seamlessly with RFID-enabled door locks to provide quick and hassle-free entry to your premises.",
        price: "2$",
        image: "../images/rfidcard.png"
    },
    {
        id: "9",
        name: "LED Light Bulb",
        description: "This LED light bulb provides bright, energy-efficient illumination for everyday use. Its modern design and long lifespan make it a cost-effective choice for both residential and commercial lighting solutions.",
        price: "2$",
        image: "../images/lightbulb.png"
    },
    {
        id: "10",
        name: "LDR Light Sensors",
        description: "These LDR light sensors are designed to accurately measure ambient light levels, making them perfect for automatic brightness adjustment systems and various other electronic applications. They offer fast response times and reliable performance.",
        price: "2$",
        image: "../images/ldrsensor.png"
    },
    {
        id: "11",
        name: "Precision Resistors",
        description: "A set of precision resistors that are essential for controlling electrical current in your circuits. They provide consistent performance and are available in various resistance values, making them ideal for a wide range of electronic projects.",
        price: "2$",
        image: "../images/resistors.png"
    },
    {
        id: "12",
        name: "High-Efficiency Solar Panel",
        description: "This high-efficiency solar panel harnesses renewable energy to power your projects sustainably. Its durable construction and superior performance make it an excellent choice for both small-scale and large-scale energy applications, reducing reliance on traditional power sources.",
        price: "5$",
        image: "../images/solarpanel.png"
    },
    {
        id: "13",
        name: "Soil Moisture Sensor",
        description: "Designed for agricultural and gardening projects, this soil moisture sensor accurately monitors the water content in your soil. It helps optimize irrigation schedules and ensures that plants receive the ideal amount of water, promoting healthier growth.",
        price: "5$",
        image: "../images/soilsensor.png"
    },
    {
        id: "14",
        name: "High-Definition LCD Screen",
        description: "This high-definition LCD screen provides clear and vibrant display output for your projects. Its sharp visuals and responsive performance make it ideal for dashboards, monitoring systems, and interactive interfaces.",
        price: "5$",
        image: "../images/lcd screen.png"
    },
    {
        id: "15",
        name: "Waterproof DC Motor",
        description: "Engineered for applications involving water, this waterproof DC motor delivers robust performance even in challenging environments. Its reliable operation and durable design make it suitable for water pumps, marine projects, and other aquatic applications.",
        price: "5$",
        image: "../images/dcmotor.png"
    }
    // now for the full systems
    , {
        id: "50",
        name: "LumiTech",
        description: "Upgrade your home with our premium Smart Lighting System, designed for comfort, convenience, and total control—no matter where you are. With our expertly installed smart lighting, you can turn lights on or off, adjust brightness,and even change colors—all from your smartphone,tablet, or voice assistant.Whether you're at home, at work, or on vacation, our system gives you the power to manage your lighting remotely, saving energy and enhancing security. Imagine arriving to a perfectly lit home or creating the perfect mood for any moment with just a tap or voice command.",
        price: "50$",
        image: "../images/smartlighting.webp"
    },
    {
        id: "51",
        name: "AquaSync",
        description: "Take control of your home’s water usage with our advanced Smart Water Management System—a solution that helps you conserve water, prevent leaks, and reduce your utility bills, all from your phone.Our system monitors water flow in real time, detects leaks instantly, and lets you shut off your water remotely to prevent damage. Whether you're at home or away, you'll get instant alerts for unusual activity—like a burst pipe or running tap—so you can act fast and avoid costly repairs.",
        price: "50$",
        image: "../images/watermangmentsystem.webp"
    },
    {
        id: "52",
        name: "AccessX",
        description: "Step into the future of home and business security with our RFID Card Lock System—a smart, touchless solution that gives you fast, secure access without keys or codes. Simply tap your RFID card and you're in. It’s that easy.",
        price: "50$",
        image: "../images/rfidcardsystem.webp"
    },
    {
        id: "53",
        name: "SolarSmart",
        description: "This system intelligently tracks ambient light using LDR sensors to optimize energy usage throughout the day. When sunlight is strong, it maximizes solar charging and output. As light dims, it smoothly transitions or powers down connected devices, helping you conserve energy without lifting a finger.Perfect for outdoor lighting, garden systems, and off-grid power setups, our smart solar system runs independently and efficiently—reducing your electricity bills and environmental impact. You can also monitor system performance, battery levels, and power output from your smartphone in real time.",
        price: "50$",
        image: "../images/solarsystemfull.webp"
    },
    {
        id: "54",
        name: "GuardianEye",
        description: "Light up your space only when you need it—with our smart Motion Sensor Light System. Designed for efficiency, convenience, and safety, this system automatically turns on your lights the moment it detects movement, and turns them off when no motion is detected.Perfect for hallways, entrances, staircases, garages, and outdoor areas, it eliminates the need for manual switches—ideal when your hands are full or you're arriving home at night. Not only does it add a layer of security by lighting up unexpected movement, but it also helps reduce energy waste by ensuring lights are only on when needed.",
        price: "50$",
        image: "../images/motionsensorsystem.webp"
    },
    {
        id: "55",
        name: "AutoLift",
        description: "Upgrade your home with our Remote-Controlled Garage Door System—designed for effortless access, enhanced security, and everyday convenience. With just the press of a button, you can open or close your garage door from the comfort of your car, smartphone, or even remotely while you're away.No more getting out of the car in bad weather or worrying about leaving your garage open. Our system features smooth, quiet operation, durable motors, and advanced safety sensors to protect your vehicle and loved ones. You can also monitor door status and receive alerts in real time, giving you peace of mind wherever you are.",
        price: "50$",
        image: "../images/garagedoorsystem.webp"
    }
];


// Function to parse query parameters from the URL
function getQueryParams() {
    const params = {};
    const queryString = window.location.search.slice(1); // remove '?'
    queryString.split('&').forEach(pair => {
        const [key, value] = pair.split('=');
        params[decodeURIComponent(key)] = decodeURIComponent(value);
    });
    return params;
}

// Once the DOM is loaded, update the page with product details
document.addEventListener("DOMContentLoaded", () => {
    const params = getQueryParams();
    const productId = params.id;
    const product = products.find(p => p.id === productId);

    if (product) {
        document.getElementById("product-img").src = product.image;
        document.getElementById("product-img").alt = product.name;
        document.getElementById("product-name").textContent = product.name;
        document.getElementById("product-desc").textContent = product.description;
        document.getElementById("product-price").textContent = "Price: " + product.price;
    } else {
        document.querySelector(".product-detail-container").innerHTML = "<p>Product not found.</p>";
    }
});

// Function to return to the previous page
function goBack() {
    window.history.back();
}
// Update the rating stars based on the user's selection
function setRating(rating) {
    var stars = document.querySelectorAll('.rating-stars .star');
    stars.forEach(function(star, index) {
        if (index < rating) {
            star.classList.add('selected');
            star.innerHTML = '&#9733;'; // filled star symbol
        } else {
            star.classList.remove('selected');
            star.innerHTML = '&#9734;'; // empty star symbol
        }
    });
    document.getElementById('user-rating').innerText =
        "You rated this product " + rating + " star" + (rating > 1 ? "s" : "");
}

// Placeholder function for the Add to Cart button
function addToCart() {
    alert("Product added to cart!");
}

// Dummy function for color selection
function selectColor(color) {
    console.log("Selected color:", color);
}

// Dummy function for the Back button
function goBack() {
    window.history.back();
}