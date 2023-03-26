$(document).ready(function() {

var WTChart = new Chart($("#waterTempDoughnut"), {
    type: 'doughnut',
    data: {
      labels: ['Red', 'Blue', 'Yellow'],
      datasets: [{
          label: 'My First Dataset',
          data: [8, 6],
          backgroundColor: [
          '#FFFFFF',
          '#BEBEBE'
          ],
          borderColor: [
          '#FFFFFF',
          '#BEBEBE'
          ],
          hoverOffset: 4,
          cutout: "80%"
      }]
    },
    options: {
      animations: false,
      maintainAspectRatio: true,
      plugins: {
          legend: {
              display: false
          }
      },
      events: [],
    }
});
var pHChart = new Chart($("#phDoughnut"), {
  type: 'doughnut',
  data: {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
        label: 'My First Dataset',
        data: [8, 6],
        backgroundColor: [
        '#FFFFFF',
        '#BEBEBE'
        ],
        borderColor: [
        '#FFFFFF',
        '#BEBEBE'
        ],
        hoverOffset: 4,
        cutout: "80%"
    }]
  },
  options: {
    animations: false,
    maintainAspectRatio: true,
    plugins: {
        legend: {
            display: false
        }
    },
    events: [],
  }
});
// setup 
const data = {
  labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
  datasets: [{
    label: 'pH Level',
    data: [, , , , , , ],
    backgroundColor: '#01BEBE',
    borderColor: '#01BEBE',
    yAxisID: 'y'
  }, {
    label: 'Water Temperature',
    data: [, , , , , , ],
    backgroundColor: '#115977',
    borderColor: '#115977',
    yAxisID: 'WT'
  }]
};

// config 
const config = {
  type: 'line',
  data,
  options: {
    scales: {
      y: {
        beginAtZero: true,
        type: 'linear',
        position: 'left'
      },
      WT: {
        beginAtZero: true,
        type: 'linear',
        position: 'right',
        grid: {
          drawOnChartArea: false,
        }
      }
    }
  }
};
// render init block
const lineGraph = new Chart(
  document.getElementById('lineGraph'),
  config
);


startRefresh();

function startRefresh() {
  setTimeout(startRefresh,1000);
  $.get('ph.php', function(data) {
      $('#pHheader').html(data);    
  });
  $.get('watertemp.php', function(data) {
      $('#wTheader').html(data + "°C");    
  });
  $.get('highpH.php', function(data) {
    $('#highpH').html(data);
  });
  $.get('highWT.php', function(data) {
    $('#highWT').html(data);
  });
  $.get('lowpH.php', function(data) {
    $('#lowpH').html(data);
  });
  $.get('lowWT.php', function(data) {
    $('#lowWT').html(data);
  });
  $.get('table.php', function(data) {
    $('#table').html(data);
  });
  updateChart();
  updatepH();
  updateWT();

}

function updateChart() {
  $.post("phchart.php", function (data) {

    var pHValue = [];
    var date = [];
    var time = [];

    for (var i in data) {
      pHValue.push(data[i].phvalueAve);
      date.push(data[i].weekday);
      time.push(data[i].time);
    }
    console.log(date[0]);
    for (let i = 0; i <= pHValue.length; i++) {
      lineGraph.data.datasets[0].data[date[i]] = pHValue[i]; 
      lineGraph.update();
    }
  });
}
function updatepH() {
  $.post("phData.php", function (data) {
   
    var pHValue = [];
    var dbstatus = [];
    var phstatus = [];
    for (var i in data) {
      pHValue.push(data[i].phvalue);
      dbstatus.push(data[i].dbstatus);
      phstatus.push(data[i].phstatus);
    }
    // console.log(pHValue);
    pHValue[1] = 14 - pHValue[0];
    $('#pHValue').text(dbstatus[0]);
    $('#pHStatus').text(phstatus[0]);
    
    pHChart.data.datasets[0].data = pHValue;
    pHChart.update();
  });
}
function updateWT() {
  $.post("tempData.php", function (data) {
    var tempVal = [];
    var tempStatus = [];
    for (var i in data) {
      tempVal.push(data[i].watertemp);
      tempStatus.push(data[i].status);
    }
    tempVal[1] = 100.00 - tempVal[0];
    $('#WTValue').text(tempStatus[0]);
    
    WTChart.data.datasets[0].data = tempVal;
    WTChart.update();
  });
}
});





