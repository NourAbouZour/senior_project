// ---------- Tab Navigation ----------
function openCategory(evt, categoryName) {
    var i, category, tablinks;
    category = document.getElementsByClassName("category");
    for (i = 0; i < category.length; i++) {
      category[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
    }
    document.getElementById(categoryName).classList.add("active");
    evt.currentTarget.classList.add("active");
  }
  
  // ---------- Garden Functions ----------
  function toggleSprinklers(isOn) {
    document.getElementById("sprinklerStatus").innerText = isOn ? "On" : "Off";
  }
  function toggleGardenLights(isOn) {
    document.getElementById("gardenLightsStatus").innerText = isOn ? "On" : "Off";
  }
  function checkSoilMoisture() {
    let moisture = Math.floor(Math.random() * 101);
    document.getElementById("soilMoistureStatus").innerText = moisture + "%";
  }
  
  // ---------- Living Room Functions ----------
  function toggleLivingRoomLights(isOn) {
    document.getElementById("livingRoomLightsStatus").innerText = isOn ? "On" : "Off";
  }
  function toggleMovieMode(isOn) {
    if (isOn) {
      document.getElementById("movieModeStatus").innerText = "Activated!";
      // Auto-reset after 5 seconds
      setTimeout(() => {
        document.getElementById("movieModeStatus").innerText = "Inactive";
        document.getElementById("movieModeSwitch").checked = false;
      }, 5000);
    } else {
      document.getElementById("movieModeStatus").innerText = "Inactive";
    }
  }
  function setTemperature(temp) {
    document.getElementById("tempValue").innerText = temp + "°C";
  }
  
  // ---------- Kitchen Functions ----------
  let ovenTimerInterval, microwaveTimerInterval;
  function toggleOvenTimer(isOn) {
    clearInterval(ovenTimerInterval);
    const display = document.getElementById("ovenTimerDisplay");
    if (isOn) {
      let minutes = parseInt(document.getElementById("ovenMinutes").value) || 0;
      let seconds = parseInt(document.getElementById("ovenSeconds").value) || 0;
      let totalTime = minutes * 60 + seconds;
      updateDisplay(display, totalTime);
      ovenTimerInterval = setInterval(() => {
        totalTime--;
        updateDisplay(display, totalTime);
        if (totalTime <= 0) {
          clearInterval(ovenTimerInterval);
          display.innerText = "Oven Ready!";
          playSound("ovenAlarmSound");
          alert("Oven timer finished!");
          // Reset the toggle switch
          document.querySelector("#kitchen input[type=checkbox][onchange^='toggleOvenTimer']").checked = false;
        }
      }, 1000);
    } else {
      display.innerText = "00:00";
    }
  }
  function toggleMicrowave(isOn) {
    clearInterval(microwaveTimerInterval);
    const display = document.getElementById("microwaveTimerDisplay");
    if (isOn) {
      let minutes = parseInt(document.getElementById("microMinutes").value) || 0;
      let seconds = parseInt(document.getElementById("microSeconds").value) || 0;
      let totalTime = minutes * 60 + seconds;
      updateDisplay(display, totalTime);
      microwaveTimerInterval = setInterval(() => {
        totalTime--;
        updateDisplay(display, totalTime);
        if (totalTime <= 0) {
          clearInterval(microwaveTimerInterval);
          display.innerText = "Food Warmed!";
          playSound("microwaveAlarmSound");
          alert("Microwave timer finished!");
          document.querySelector("#kitchen input[type=checkbox][onchange^='toggleMicrowave']").checked = false;
        }
      }, 1000);
    } else {
      display.innerText = "00:00";
    }
  }
  function updateDisplay(displayElement, totalTime) {
    let minutes = Math.floor(totalTime / 60);
    let seconds = totalTime % 60;
    displayElement.innerText = (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
  }
  function updateFridgeTemp(value) {
    document.getElementById("fridgeTempDisplay").innerText = value + "°C";
  }
  function playSound(audioId) {
    document.getElementById(audioId).play();
  }
  
  // ---------- Bedroom Functions ----------
  function toggleBlinds(isOn) {
    document.getElementById("blindsStatus").innerText = isOn ? "Open" : "Closed";
  }
  function toggleSleepMode(isOn) {
    document.getElementById("sleepModeStatus").innerText = isOn ? "Activated" : "Off";
    document.body.style.background = isOn ? "#2c3e50" : "#f5f5f5";
  }
  let alarmInterval;
  function toggleWakeUpAlarm(isOn) {
    if (isOn) {
      const alarmTimeInput = document.getElementById("alarmTimeInput").value;
      if (!alarmTimeInput) {
        alert("Please select a valid date and time for the alarm.");
        document.getElementById("wakeUpSwitch").checked = false;
        return;
      }
      const alarmTime = new Date(alarmTimeInput);
      document.getElementById("wakeUpStatus").innerText = "Alarm Set!";
      // Check every second if current time reaches alarm time
      alarmInterval = setInterval(() => {
        let now = new Date();
        if (now >= alarmTime) {
          clearInterval(alarmInterval);
          document.getElementById("wakeUpStatus").innerText = "Ringing!";
          playSound("bedroomAlarmSound");
          alert("Wake Up Alarm is Ringing!");
          document.getElementById("wakeUpSwitch").checked = false;
        }
      }, 1000);
    } else {
      clearInterval(alarmInterval);
      document.getElementById("wakeUpStatus").innerText = "Off";
    }
  }
  
  // ---------- Bathroom Functions ----------
  let showerTimerInterval;
  function toggleShowerTimer(isOn) {
    clearInterval(showerTimerInterval);
    const display = document.getElementById("showerTimerDisplay");
    if (isOn) {
      let minutes = parseInt(document.getElementById("showerMinutes").value) || 0;
      let seconds = parseInt(document.getElementById("showerSeconds").value) || 0;
      let totalTime = minutes * 60 + seconds;
      updateDisplay(display, totalTime);
      showerTimerInterval = setInterval(() => {
        totalTime--;
        updateDisplay(display, totalTime);
        if (totalTime <= 0) {
          clearInterval(showerTimerInterval);
          display.innerText = "Shower Ready!";
          playSound("bathroomAlarmSound");
          alert("Shower heater timer finished!");
          document.querySelector("#bathroom input[type=checkbox][onchange^='toggleShowerTimer']").checked = false;
        }
      }, 1000);
    } else {
      display.innerText = "00:00";
    }
  }
  function toggleDefogger(isOn) {
    document.getElementById("defoggerStatus").innerText = isOn ? "On" : "Off";
  }
  function toggleBathroomMusic(isOn) {
    const audio = document.getElementById("bathroomMusicAudio");
    if (isOn) {
      audio.play();
      document.getElementById("bathroomMusicStatus").innerText = "Playing";
    } else {
      audio.pause();
      document.getElementById("bathroomMusicStatus").innerText = "Off";
    }
  }
  
  // ---------- Garage Functions ----------
  function toggleGarageDoor(isOn) {
    document.getElementById("garageDoorStatus").innerText = isOn ? "Opened" : "Closed";
  }
  function toggleCarLocator(isOn) {
    if (isOn) {
      document.getElementById("carLocatorStatus").innerText = "Locating...";
      setTimeout(() => {
        document.getElementById("carLocatorStatus").innerText = "Car Found!";
        document.querySelector("#garage input[type=checkbox][onchange^='toggleCarLocator']").checked = false;
      }, 3000);
    } else {
      document.getElementById("carLocatorStatus").innerText = "Inactive";
    }
  }
  function toggleSecurity(isOn) {
    document.getElementById("securityStatus").innerText = isOn ? "Armed" : "Disarmed";
  }
  