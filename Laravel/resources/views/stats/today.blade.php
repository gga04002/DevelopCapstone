<div class="container">
  <div class="row">
      <div class="col-3 top-div-box-1">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header">오늘 총 착석시간</div>
          <div class="card-body text-success">
            <h5 class="card-title">6시간 40분</h5>
            <p class="card-text">프로그레스 바</p>
          </div>
        </div>
      </div>

      <div class="col-3 top-div-box-2">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header">바른자세로 앉은 시간</div>
          <div class="card-body text-success">
            <h5 class="card-title">2시간 15분</h5>
            <p class="card-text">프로그레스 바</p>
          </div>
        </div>
      </div>

      <div class="col-3 top-div-box-3">
        <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header">오늘 가장 많이 취한 자세</div>
            <div class="card-body text-success">
              <h5 class="card-title">왼쪽다리 꼰 자세</h5>
              <p class="card-text">프로그레스바</p>
            </div>
          </div>
      </div>

      <div class="col-3 top-div-box-4">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">애니메이션</div>
          <div class="card-body text-primary">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      
      <div class="col-9 main-div-box">
        {{--{!! json_encode($data) !!}--}}
        <?php $msg = $data; ?>
        <h2>오늘하루 자세 추이</h2>
        <canvas id="lineChart"></canvas>
      </div>

      <div class="col-3 right-banner-box">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header">연속해서 가장 오래 앉은 시간</div>
          <div class="card-body text-success">
            <h5 class="card-title">1시간 50분</h5>
            <p class="card-text">자주 일어나서 스트레칭을 해주세요!</p>
          </div>
        </div>
      </div>

      <div class="col-6 main-div-box" style="margin-top:30px;">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">오늘 하루 어떤 자세로 앉았을까?</h5>
            <canvas id="labelChart1"></canvas>
          </div>
        </div>   
      </div>

      <div class="col-6 main-div-box" style="margin-top:30px;">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">바른자세 / 나쁜자세로 앉은 비율</h5>
            <canvas id="labelChart2"></canvas>
          </div>
        </div> 
      </div>

      <div class="col-9 main-div-box" style="margin-top:30px;">
        <h2>시간별 자세 추이</h2>
        <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            자세 선택
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" id="good">바른자세</a>
            <a class="dropdown-item" id="cross-left-leg">왼쪽다리 꼰 자세</a>
            <a class="dropdown-item" id="cross-right-leg">오른쪽다리 꼰 자세</a>
            <a class="dropdown-item" id="edge-lean">뒤로 기댄 자세</a>
            <a class="dropdown-item" id="lean-toward">앞으로 구부정한 자세</a>
            <a class="dropdown-item" id="lean-left">왼쪽으로 구부정한 자세</a>
            <a class="dropdown-item" id="lean-right">오른쪽으로 구부정한 자세</a>

          </div>
        </div>
        <div id="myChart-div">
          <canvas class="myChart"></canvas>
        </div>
      </div>

  </div>
</div>

<script type="text/javascript">
  var msg = <?php echo $msg ?>;
  console.log(msg);

  var colors = {
    'green': '#00e36a',
    'red': '#F7464A',
    'yellow': '#FDB45C',
    'pink': '#ffacb7',
    'blue': '#0d8aff',
    'purple': '#a6b1e1',// #9399ff
    'negativeBlue': '#4f98ca',
    'grey': '#c4c4c4',
    'blueGreen': '#46BFBD',
    'hoverBlue': '#309bff',
    'hoverBlueGreen': '#5AD3D1',
    'hoverRed': '#FF5A5E',
  };

  //line
  var ctxL1 = document.getElementById("lineChart").getContext('2d');
  var myLineChart1 = new Chart(ctxL1, {
    type: 'line',
    data: {
      labels: ["1", "2", "3", "4", "5", "6", "7"],
      datasets: [
        {
          label: "바른자세 추이",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(0, 227, 106, .2)',
          ],
          borderColor: [
            'rgba(0, 227, 106, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "나쁜자세 추이",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: [
            'rgba(255, 59, 59, .2)',
          ],
          borderColor: [
            'rgba(255, 59, 59, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });

  var ctxP1 = document.getElementById("labelChart1").getContext('2d');
  var allPosPieChart = new Chart(ctxP1, {
    plugins: [ChartDataLabels],
    type: 'pie',
    data: {
      labels: [
        "바른자세", 
        "왼쪽다리 꼰 자세", 
        "오른쪽다리 꼰 자세", 
        "뒤로 기댄 자세", 
        "앞으로 구부정한 자세", 
        "왼쪽으로 구부정한 자세", 
        "오른쪽으로 구부정한 자세"
      ],
      datasets: [{
        data: [210, 130, 120, 160, 120, 30, 30],
        backgroundColor: [
          colors.green,
          colors.red,
          colors.yellow,
          colors.pink,
          colors.purple,
          colors.negativeBlue,
          colors.grey,
        ],
        hoverBackgroundColor: [
          colors.green,
          colors.red,
          colors.yellow,
          colors.pink,
          colors.purple,
          colors.negativeBlue,
          colors.grey
        ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'right',
        labels: {
          padding: 20,
          boxWidth: 10
        }
      },
      plugins: {
        datalabels: {
          formatter: (value, ctx) => {
            let sum = 0;
            let dataArr = ctx.chart.data.datasets[0].data;
            dataArr.map(data => {
              sum += data;
            });
            let percentage = (value * 100 / sum).toFixed(2) + "%";
            return percentage;
          },
          color: 'white',
          labels: {
            title: {
              font: {
                size: '16'
              }
            }
          }
        }
      }
    }
  });

  var ctxP2 = document.getElementById("labelChart2").getContext('2d');
  var twoPosPieChart = new Chart(ctxP2, {
    plugins: [ChartDataLabels],
    type: 'pie',
    data: {
      labels: ["바른자세", "나쁜자세"],
      datasets: [{
        data: [58, 42],
        backgroundColor: [colors.blue, colors.red],
        hoverBackgroundColor: [colors.hoverBlue, colors.hoverRed]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'right',
        labels: {
          padding: 20,
          boxWidth: 10
        }
      },
      plugins: {
        datalabels: {
          formatter: (value, ctx) => {
            let sum = 0;
            let dataArr = ctx.chart.data.datasets[0].data;
            dataArr.map(data => {
              sum += data;
            });
            let percentage = (value * 100 / sum).toFixed(2) + "%";
            return percentage;
          },
          color: 'white',
          labels: {
            title: {
              font: {
                size: '16'
              }
            }
          }
        }
      }
    }
  });


  var ctxL2 = document.getElementsByClassName("myChart");

  var myLineChart2 = new Chart(ctxL2, {
    type: 'line',
    data: {
      labels: ["1", "2", "3", "4", "5", "6", "7"],
      datasets: [
        {
          label: "바른자세 추이",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(64, 137, 255, .2)',
          ],
          borderColor: [
            'rgba(64, 137, 255, .7)',
          ],
          borderWidth: 2
        },
      ]
    },
    options: {
      responsive: true
    }
  });

  $('#good').click(function(e){

  });
</script>