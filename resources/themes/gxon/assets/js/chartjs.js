/* --------------------------------------------------
   GLOBAL BOOTSTRAP CSS VARIABLES (cached once)
-------------------------------------------------- */
const rootStyles = getComputedStyle(document.documentElement);
const bsVars = {
    bodyBG: rootStyles.getPropertyValue('--bs-body-bg').trim(),
    primary: rootStyles.getPropertyValue('--bs-primary').trim(),
    secondary: rootStyles.getPropertyValue('--bs-secondary').trim(),
    bodyColor: rootStyles.getPropertyValue('--bs-body-color').trim(),
    borderColor: rootStyles.getPropertyValue('--bs-border-color').trim(),
    headingColor: rootStyles.getPropertyValue('--bs-heading-color').trim(),
    fontFamily: rootStyles.getPropertyValue('--bs-body-font-family').trim()
};


/* --------------------------------------------------
   SAFE GET CANVAS CONTEXT
-------------------------------------------------- */
const getCtx = (id) => {
    const el = document.getElementById(id);
    return el ? el.getContext("2d") : null;
};


/* --------------------------------------------------
   COMMON CENTER TEXT PLUGIN (dynamic)
-------------------------------------------------- */
const centerTextPlugin = (valueLabel = "Total") => ({
    id: "centerText",
    afterDraw(chart) {
        const { ctx, chartArea: { left, right, top, bottom } } = chart;
        const centerX = (left + right) / 2;
        const centerY = (top + bottom) / 2;

        const dataset = chart.data.datasets[0];
        const total = dataset.data.reduce((a, b) => a + b, 0);

        let label = valueLabel;
        let value = total;

        const active = chart.getActiveElements();
        if (active.length) {
            const index = active[0].index;
            label = chart.data.labels[index];
            value = dataset.data[index];
        }

        ctx.save();
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";

        ctx.font = "bold 26px sans-serif";
        ctx.fillStyle = bsVars.headingColor;
        ctx.fillText(value, centerX, centerY - 6);

        ctx.font = "14px sans-serif";
        ctx.fillStyle = bsVars.bodyColor;
        ctx.fillText(label, centerX, centerY + 16);

        ctx.restore();
    }
});


/* --------------------------------------------------
   COMPANY PAY CHART
-------------------------------------------------- */
function companyPayChart() {
    const ctx = getCtx("companyPayChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Salary", "Bonus", "Commission", "Overtime", "Reimbursement", "Benefits"],
            datasets: [{
                data: [600, 643, 1608, 884, 2251, 1447],
                backgroundColor: ['#FF401C', '#22B07E', '#02B4FA', '#FF8110', '#316AFF', '#FDBB1F'],
                borderRadius: 30,
                borderWidth: 2,
                borderColor: "#fff",
                hoverOffset: 5
            }]
        },
        options: {
            cutout: "85%",
            plugins: { legend: { display: false }, tooltip: { enabled: false } }
        },
        plugins: [centerTextPlugin("Total Data")]
    });
}


/* --------------------------------------------------
   EMPLOYEE TYPE CHART
-------------------------------------------------- */
function employeeTypeChart() {
    const ctx = getCtx("employeeTypeChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Onsite", "Remote", "Hybrid"],
            datasets: [{
                data: [600, 200, 200],
                backgroundColor: ['#316AFF', '#FF8110', '#FDBB1F'],
                borderRadius: 10,
                hoverOffset: 5,
                borderWidth: 4,
                borderColor: "#fff"
            }]
        },
        options: {
            cutout: "65%",
            plugins: { legend: { display: false } }
        },
        plugins: [centerTextPlugin("Employee")]
    });
}


/* --------------------------------------------------
   PERFORMANCE ANALYSIS RADAR CHART
-------------------------------------------------- */
function performanceAnalysisChart() {
    const ctx = getCtx("performanceAnalysisChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "radar",
        data: {
            labels: ["Speed", "Reliability", "Comfort", "Safety", "Efficiency", "Design"],
            datasets: [
                {
                    label: "Product A",
                    data: [65, 59, 90, 81, 56, 55],
                    backgroundColor: "rgba(13,110,253,0.15)",
                    borderColor: "rgba(13,110,253,1)",
                    pointBackgroundColor: "rgba(13,110,253,1)"
                },
                {
                    label: "Product B",
                    data: [28, 48, 40, 19, 96, 27],
                    backgroundColor: "rgba(25,135,84,0.15)",
                    borderColor: "rgba(25,135,84,1)",
                    pointBackgroundColor: "rgba(25,135,84,1)"
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                r: {
                    angleLines: { color: "#eee" },
                    grid: { color: "#e6e6e6" },
                    ticks: { backdropColor: "transparent" }
                }
            }
        }
    });
}


/* --------------------------------------------------
   BAR CHART
-------------------------------------------------- */
function barChart() {
    const ctx = getCtx("barChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [
                { label: "Data 1", data: [12, 19, 3, 17, 28, 24, 7], backgroundColor: bsVars.primary },
                { label: "Data 2", data: [30, 29, 5, 5, 20, 3, 10], backgroundColor: bsVars.secondary }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
}


/* --------------------------------------------------
   LINE CHART
-------------------------------------------------- */
function lineChart() {
    const ctx = getCtx("lineChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [
                {
                    label: "Dataset 1",
                    data: [30, 50, 40, 60, 35, 70, 55],
                    borderColor: bsVars.primary,
                    pointBackgroundColor: bsVars.primary,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: "Dataset 2",
                    data: [20, 35, 45, 30, 60, 40, 65],
                    borderColor: bsVars.secondary,
                    pointBackgroundColor: bsVars.secondary,
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}


/* --------------------------------------------------
   MASTER INIT — LOAD ALL CHARTS
-------------------------------------------------- */
document.addEventListener("DOMContentLoaded", () => {
    try {
        companyPayChart();
        employeeTypeChart();
        performanceAnalysisChart();
        barChart();
        lineChart();
    } catch (err) {
        console.error("Chart initialization error:", err);
    }
});
