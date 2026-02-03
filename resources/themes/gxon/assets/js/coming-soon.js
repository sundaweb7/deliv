const countdownConfig = {
    endDate: new Date("2026-08-25T23:59:59").getTime(),
    autoReset: true,
    cycleDurationDays: 10
};

const getEl = (id) => document.getElementById(id) || null;

function initCountdown() {
    let { endDate, autoReset, cycleDurationDays } = countdownConfig;

    const elCountdown = getEl("countdown");
    const elDays = getEl("days");
    const elHours = getEl("hours");
    const elMinutes = getEl("minutes");
    const elSeconds = getEl("seconds");

    if (!elCountdown || !elDays || !elHours || !elMinutes || !elSeconds) {
        console.warn("Countdown: Required DOM elements missing!");
        return;
    }

    function render() {
        const now = Date.now();
        let remaining = endDate - now;

        if (remaining <= 0) {

            if (autoReset) {
                const cycleMs = cycleDurationDays * 24 * 60 * 60 * 1000;
                endDate = now + cycleMs;
                remaining = endDate - now;
            } else {
                elCountdown.innerHTML = "<h2>We Are Live!</h2>";
                clearInterval(timer);
                return;
            }
        }

        const days = Math.floor(remaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((remaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((remaining % (1000 * 60)) / 1000);

        elDays.textContent = String(days).padStart(2, "0");
        elHours.textContent = String(hours).padStart(2, "0");
        elMinutes.textContent = String(minutes).padStart(2, "0");
        elSeconds.textContent = String(seconds).padStart(2, "0");
    }

    render();

    const timer = setInterval(render, 1000);
}

document.addEventListener("DOMContentLoaded", initCountdown);