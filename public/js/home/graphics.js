let companiesLabel = [];
let employeesData = [];

getDataCompanies();

async function getDataCompanies() {
    const companiesData = await fetch("/getInformationCompanies");
    const result = await companiesData.json();
    const data = await result;
    data.forEach((company) => {
        const { name, employees } = company;
        companiesLabel.push(name);
        employeesData.push(employees.length);
    });
    if (companiesLabel.length > 0 && employeesData.length > 0) {
        renderGraphic(companiesLabel, employeesData);
        renderPieGraphic(companiesLabel, employeesData);
    } else {
        document.querySelector("#containerGraphics").innerHTML = `
            <div class="alert alert-danger">
                <strong>Opps...! </strong><i class="far fa-thumbs-down"></i>
                Sin datos para mostrar
            </div>
        `;
    }
}

function renderGraphic(companiesLabel, employeesData) {
    var ctx = document.getElementById("companiesBar").getContext("2d");
    var companiesBar = new Chart(ctx, {
        type: "bar",
        data: {
            labels: companiesLabel,
            datasets: [
                {
                    label: "Empleados por compañía Bar Chart",
                    data: employeesData,
                    backgroundColor: [
                        "rgba(54, 162, 235, 0.6)",
                        "rgba(255, 206, 86, 0.6)",
                        "rgba(255, 0, 18, 0.6)",
                        "rgba(75, 192, 192, 0.6)",
                        "rgba(153, 102, 255, 0.6)",
                        "rgba(255, 159, 64, 0.6)",
                    ],
                    borderColor: [
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(255, 0, 18, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });
}

function renderPieGraphic(companiesLabel, employeesData) {
    var ctx = document.getElementById("companiesPie").getContext("2d");
    var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
            datasets: [
                {
                    data: employeesData,
                    backgroundColor: [
                        "rgba(54, 162, 235, 0.6)",
                        "rgba(255, 206, 86, 0.6)",
                        "rgba(255, 0, 18, 0.6)",
                        "rgba(75, 192, 192, 0.6)",
                        "rgba(153, 102, 255, 0.6)",
                        "rgba(255, 159, 64, 0.6)",
                    ],
                    borderColor: [
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(255, 0, 18, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
            labels: companiesLabel,
        },
    });
}
