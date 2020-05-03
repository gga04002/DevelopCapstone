@extends('menu')

@section('main')
<div id="show-challenge-container">
  <div class="entry-form" id="entry_{{$challenge->id}}">
    <h1>{{$challenge->name}} 참가하기</h1> <br>
    <form action="/challenge" id="entry_form" method="post">
    {!! csrf_field() !!}
      <div id="form_data">
        <input type="hidden" name="challenge_id" value="{{$challenge->id}}">

        <input type="hidden" id="challenge_name" name="challenge_name" value="{{$challenge->name}}">
        <input type="hidden" value="1" name="user_id">

        <br>

        <label for="join_date">챌린지 시작 날짜</label>
        <input type="date" id="start_date" name="start_date">

        <br>

        <label for="join_term">챌린지 마무리 날짜</label>
        <input type="date" id="end_date" name="end_date">
       {{-- <input type="hidden" id="entry_term" name="entry_term" value=""> --}}

        <br>
        
        <input type="radio" name="entry_fee_radio" id="pay_entry_fee">참가비 지불하고 참가하기
        <input type="radio" name="entry_fee_radio" id="not_pay_entry_fee">무료로 참가하기

       <br>
      </div>
      <button type="submit">참가하기</button>
    </form>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    });

    // var start_date_str;
    // var end_date_str;
    // var start_date_array;
    // var end_date_array;
    
    // $('#start_date').change(function(){
    //   alert('start_date 값 변경');
    //   start_date_str = $('#start_date').val();
    //   start_date_array = start_date_str.split('-');
    //   console.log(start_date_array);
    // });

    // $('#end_date').change(function(){
    //   alert('end_date 값 변경');
    //   end_date_str = $('#end_date').val();
    //   end_date_array = end_date_str.split('-');
    //   console.log(end_date_array);
    // });

    // console.log(start_date_array);
/*
    var start_date = new Date(start_date_array[0], Number(start_date_array[1])-1, start_date_array[2]);
    var end_date = new Date(end_date_array[0], Number(end_date_array[1])-1, end_date_array[2]);
    console.log(start_date+'그리고 '+end_date);

    var between_day = (end_date.getTime() - start_date.getTime()) / 1000/60/60/24;
    console.log(between_day);

    document.getElementById('entry_term').setAttribute('value', between_day); // 참가 기간 구하기
*/
    var entry_count = 0;

    $('#pay_entry_fee').click(function(e){
      entry_count++;
      if(entry_count == 1){
        var label = document.createElement('label');
        label.setAttribute('for', 'entry_fee');
        label.setAttribute('id', 'entry_fee_label')

        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('id', 'entry_fee');
        input.setAttribute('name', 'entry_fee');
        input.setAttribute('hint', '금액 입력');
        
        var parent = document.getElementById('form_data');
        parent.appendChild(label);
        parent.appendChild(input);
      }
    });

    $('#not_pay_entry_fee').click(function(e){
      if($('#entry_fee').length) {
        $('#entry_fee_label').remove();
        $('#entry_fee').remove();
        entry_count = 0;
      }
    });

  });
</script>

@endsection