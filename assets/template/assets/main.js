// SFP1 SHOW
function loadTrafficSFP1() {
    const display1 = document.getElementById('showSFP1')
    const display2 = document.getElementById('showSFP2')
    const display3 = document.getElementById('showEth2')

    display1.style.display = ("block")
    display2.style.display = ("none")
    display3.style.display = ("none")
}

// SFP2 SHOW
function loadTrafficSFP2() {
    const display1 = document.getElementById('showSFP1')
    const display2 = document.getElementById('showSFP2')
    const display3 = document.getElementById('showEth2')

    display1.style.display = ("none")
    display2.style.display = ("block")
    display3.style.display = ("none")
}

// ETH 2 SHOW
function loadTrafficEth2() {
    const display1 = document.getElementById('showSFP1')
    const display2 = document.getElementById('showSFP2')
    const display3 = document.getElementById('showEth2')

    display1.style.display = ("none")
    display2.style.display = ("none")
    display3.style.display = ("block")
}

// PPP ACTIVE RELOAD PAGES
function Reload() {
    window.setTimeout(function () {
        window.location.reload();
    });
}


// document.addEventListener('DOMContentLoaded', function () {
//     const chart = Highcharts.chart('container', {
//         chart: {
//             type: 'bar'
//         },
//         title: {
//             text: 'Fruit Consumption'
//         },
//         xAxis: {
//             categories: ['Apples', 'Bananas', 'Oranges']
//         },
//         yAxis: {
//             title: {
//                 text: 'Fruit eaten'
//             }
//         },
//         series: [{
//             name: 'Jane',
//             data: [1, 0, 4]
//         }, {
//             name: 'John',
//             data: [5, 7, 3]
//         }]
//     });
// });


// var myChart = 
// Highcharts.chart('container',
// {
//     chart: {
//         type: 'line'
//     },
//     series:[{
//         name: 'Data Series',
//         data: [1,2,32,4,213,32,35,33,2,213]
//     }]

// })