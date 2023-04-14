var ctx2 = document.getElementById('doughnut').getContext('2d');
const data2 = {
    labels: [
      'Paid',
      'Unpaid',
    ],
    datasets: [{
      label: 'Revenue',
      data: [300, 500],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
      ],
      hoverOffset: 4,
    }]
  };
const myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: data2,
});