var subctx2 = document.getElementById('subdoughnut').getContext('2d');

const subdata2 = {
    labels: [
      'Total',
      'Vacant',
      'Occupied'
    ],
    datasets: [{
      label: 'Revenue',
      data: [300, 500, 700],
      backgroundColor: [
        '#FA7070',
        '#36A2EB',
        '#A1C298',
      ],
      hoverOffset: 4,
      cutout: '90%',
      borderRadius: 20,
      offset: 10
    }]
  };

  const config2 = {
    type: 'doughnut',
    data: subdata2,
    options: {
      responsive: true
    }
};

const subChart2 = new Chart(subctx2, config2);