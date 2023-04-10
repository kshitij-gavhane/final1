const ctx1 = document.getElementById('barChart').getContext('2d');
const subctx = document.getElementById('subBarChart').getContext('2d');

//data1 for main zone chart
const data1 = {
    labels: ['Zone 1', 'Zone 2', 'Zone 3', 'Zone 4', 'Zone 5', 'Zone 6', 'Zone 7', 'Zone 8', 'Zone 9', 'Zone 10'],
    datasets: [{
        label: 'Earnings in 2022',
        data: [
            {x: 'Zone 1', y: 100606, sales: [899, 2930, 2966, 769, 1154, 481, 898, 520, 321, 641], title: 'Zone 1'},
            {x: 'Zone 2', y: 114229, sales: [321, 193, 1283, 821, 2052, 1231, 411, 1042, 523, 361], title: 'Zone 2' },
            {x: 'Zone 3', y: 108976, sales: [411, 321, 652, 789, 1001, 1231, 812, 645, 723, 929], title: 'Zone 3' },
            {x: 'Zone 4', y: 27231, sales: [899, 2930, 2966, 769, 1154, 481, 898, 520, 321, 641], title: 'Zone 4' },
            {x: 'Zone 5', y: 51540, sales: [411, 321, 652, 789, 1001, 1231, 812, 645, 723, 929], title: 'Zone 5' },
            {x: 'Zone 6', y: 48145, sales: [899, 2930, 2966, 769, 1154, 481, 898, 520, 321, 641], title: 'Zone 6' },
            {x: 'Zone 7', y: 41522, sales: [321, 193, 1283, 821, 2052, 1231, 411, 1042, 523, 361], title: 'Zone 7' },
            {x: 'Zone 8', y: 71898, sales: [899, 2930, 2966, 769, 1154, 481, 898, 520, 321, 641], title: 'Zone 8' },
            {x: 'Zone 9', y: 52520, sales: [411, 321, 652, 789, 1001, 1231, 812, 645, 723, 929], title: 'Zone 9' },
            {x: 'Zone 10', y: 27321, sales: [321, 193, 1283, 821, 2052, 1231, 411, 1042, 523, 361], title: 'Zone 10' }
        ],
        borderRadius: 20,
        backgroundColor: ['#ff9770', '#ffd166', '#ffd670', '#e9ff70', '#70d6ff', '#0a2463', '#3e92cc', '#ff70a6', '#d8315b', '#06d6a0'],
        borderWidth: 1
    }]
};

// config for main zone chart
const config1 = {
    type: 'bar',
    data: data1,
    options: {
        scales: {
            y:{
                beginAtZero: true
            }
        }
    }
};

//render for main zone chart
const myChart1 = new Chart(ctx1, config1);

//subd1 data for sub chart
const subd1 = {
    labels: ['Shop 1', 'Shop 2', 'Shop 3', 'Shop 4', 'Shop 5', 'Shop 6','Shop 7', 'Shop 8', 'Shop 9','Shop 10'],
    datasets: [{
        label: 'Zone 1',
        data: [899, 2930, 2966, 769, 1154, 481, 898, 520, 321, 641],
        backgroundColor: '#ff9770',
        borderWidth: 1
    }]
};

// config for sub chat
const subconfig = {
    type: 'bar',
    data: subd1,
    options: {
        responsive: true,
        scales: {
            y:{
                beginAtZero: true
            }
        }
    }
};

// render sub chart
const subchar1 = new Chart(subctx, subconfig);

function clickHandler(click){
    const points = myChart1.getElementsAtEventForMode(click, 'nearest', { intersect: true }, true);
    if (points.length) {
        console.log(subchar1.config.data.datasets[0].label);
        subchar1.config.data.datasets[0].backgroundColor = points[0].element.options.backgroundColor
        subchar1.config.data.datasets[0].label = points[0].element.$context.raw.title;
        subchar1.config.data.datasets[0].data = points[0].element.$context.raw.sales;
        subchar1.update();
    }
};

myChart1.canvas.onclick = clickHandler;