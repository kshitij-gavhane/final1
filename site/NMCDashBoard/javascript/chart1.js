const ctx1 = document.getElementById('lineChart').getContext('2d');
var lables= getl1();
var data= getd1();
const baccolor=[];
for(i=0;i<lables.length;i++){
    const r = Math.floor(Math.random() * 255);
    const g = Math.floor(Math.random() * 255);
    const b = Math.floor(Math.random() * 255);
    baccolor.push('rgba('+r+', '+g+', '+b+', 0.7)');
}
const data1 = {
    labels: lables,
    datasets: [{
        label: 'Earnings in 2019',
        data: data,
        backgroundColor: baccolor,
        borderWidth: 1
    }]
};
const myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: data1,
    options: {
        responsive: true
    }
});