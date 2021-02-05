var THE_DATA = new Array(4);

$.get('get-topbrands.php',function(data){
    var temp = JSON.parse(data);
    for(var i = 0;i < temp.length;i++) {
        var pos = checkPosition(temp[i]);
        if(pos!== -1) {
            THE_DATA[i] = Number(temp[i].total);
        }
    }

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Bass", "Biola", "Gitar", "Harmonika", "Pianika", "Piano"],
            datasets: [{
                label: 'TOTAL PEMBELIAN',
                data: THE_DATA,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,


            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});

function checkPosition(data) {
    switch(data.jenis) {
        case 'Bass':
            return 0;
        break;
        case 'Biola':
            return 1;
        break;
        case 'Gitar':
            return 2;
        break;
        case 'Harmonika':
            return 3;
        break;
        case 'Pianika':
            return 3;
        break;
        case 'Piano':
            return 3;
        break;
        default:
        return -1;
    }
}
