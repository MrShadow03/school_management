//const ctx = document.getElementById('').getContext("2d");

const myChart = document.getElementById("admin-bar-chart").getContext("2d");

let gradient = myChart.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0.15, "rgba(0,254,204,1)");
gradient.addColorStop(1, "rgba(53,132,255,.5)"); //blue

//blue

const labels = [
	"2021",
	"2022",
	"2023",
	"2024",
	"2025",
	"2026",
	"2027",
	"2028",
	"2029",
];

const data = {
	labels,
	datasets: [
		{
			data: [290, 212, 215, 250, 365, 250, 322, 365, 302],
			label: "Total users",
			tension: 0,
		},
	],
};

const config = {
	type: "line",
	data: data,
	options: {
		responsive: true,
		plugins: {
			legend: {
				display: false,
			},
		},
		fill: true,
		backgroundColor: gradient,
		borderColor: "#1c1c1c1c",
		hitRadius: 50,
		hoverRadius: 15,
	},
};

const chart = new Chart(myChart, config);
