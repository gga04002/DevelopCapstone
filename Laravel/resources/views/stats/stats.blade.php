@extends('top_nav')

@section('main')
<div id="select-stat-mode">
  <form action="">
    <label for="select-stat">기간을 선택하세요</label>
    <br>
    <select id="select-stat">
      <option>오늘 하루</option>
      <option>이번주</option>
      <option>이번달</option>
    </select>
  </form>
</div>

<div id="line-container">
  <canvas id="today-line-chart"></canvas>
</div>

<div class="container" id="pie-container">
  <canvas id="sum-pie-chart"></canvas>
</div>

<div class="time">
  <div id="today_sum_time"></div>
</div>

<script>
  // Chart.platform.disableCSSInjection = true;
  // var cData = JSON.parse(`?php echo $daily_stat?`); 
  // console.log(cData);
  var ctx_sum = document.getElementById('sum-pie-chart');
  var ctx_line = document.getElementById('today-line-chart');
  const colors = [
    '#00f587', // 그린
    '#ff5454', // 레드
    '#ffd271', // bad
    '#6e5773', // bad
    '#f65c78', //bad
    ];

  const sumPie_data = [10, 30, 20, 25, 15];
  // const sumPie_data = [cData['good_time'], cData['bad_time']];
  
  var todayLine = new Chart(ctx_line, {
    type: 'line',
    data: {
      labels: ['1', '2', '3', '4', '5', '6', '7'],
        datasets: [{
            label: '테스트 데이터셋',
            data: [
                10,
                3,
                30,
                23,
                10,
                5,
                50
            ],
            borderColor: "rgba(255, 201, 14, 1)",
            backgroundColor: "rgba(255, 201, 14, 0.5)",
            fill: true,
            lineTension: 0
        }]
    },
    options: {
      maintainAspectRatio: false,
      // responsive: true,
        title: {
            display: true,
            text: '오늘 하루 자세 추이'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'x축: 시간'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    suggestedMin: 0,
                },
                scaleLabel: {
                    display: true,
                    labelString: 'y축: 비율'
                }
            }]
        }
    }
  });

  var sumPie = new Chart(ctx_sum, {
    type: 'pie',
    data: {
      labels: [
        '바른자세', 
        '다리 꼼', 
        '기대고 앉기', 
        '구부정한 자세', 
        '의자 끝에 엉덩이 걸치기'],
      datasets: [{
        label: 'colors',
        data: sumPie_data,
        backgroundColor: [
          colors[0],
          colors[1],
          colors[2],
          colors[3],
          colors[4],
        ],
      }],
    },
    options: {
      // responsive: false,
      maintainAspectRatio: false,
      title: {
        display: true,
        text: '착석자세 분류 통계',
      }
    },
  });

</script>
@endsection