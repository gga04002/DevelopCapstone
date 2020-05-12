@extends('top_nav')

@section('main')
<div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-12 main-div-box" style="margin-bottom: 15px;">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary" id="today-btn">오늘</button>
          <button type="button" class="btn btn-secondary" id="week-btn">이번주</button>
          <button type="button" class="btn btn-secondary" id="month-btn">이번달</button>
        </div>
      </div>

      <div id="include">
        @include('stats.today', ['data'=> $data])
      </div>

    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('#today-btn').click(function(){
      $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          method: "GET",
          url: "/stats/today",
          // dataType: 'json',
          // data: data,
          success: function (res)
          {
            console.log('success');
            console.log(res);
            // console.log(data);
            $('#include').children().remove();
            $('#include').html(res);

            // $('#include').html(res.data);
          },
          error: function()
          {
              alert('Failed');
          }
      });
    });

    $('#week-btn').click(function(){
      $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          method: "GET",
          url: "/stats/week",
          // dataType: 'json',
          success: function (res)
          {
            console.log('success');
            $('#include').children().remove();
            $('#include').html(res);
            // $('#include').html(res.data);
          },
          error: function()
          {
              alert('Failed');
          }
      });
    });

    $('#month-btn').click(function(){
      $.ajax({
          headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          method: "GET",
          url: "/stats/month",
          // dataType: 'json',
          // data:data,
          success: function (res)
          {
            console.log('success');
            $('#include').children().remove();
            $('#include').html(res);
            // $('#include').html(res.data);
          },
          error: function()
          {
              alert('Failed');
          }
      });
    });
  });
</script>
@endsection