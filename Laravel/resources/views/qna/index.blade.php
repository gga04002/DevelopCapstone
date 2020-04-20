@extends('headers.header')

@section('content')

    <div>질문 페이지</div>

    <br>

    <div id="qna_table" align="center">
        <div id="qna_header">
            <div class="qna_bar" id="qb_id">번호</div>
            <div class="qna_bar" id="qb_title">제목</div>
            <div class="qna_bar" id="qb_user">작성자</div>
            <!-- <div class="qna_bar"  id="qb_ans">답글 개수</div> -->
            <div class="qna_bar"  id="qb_created">등록일</div>
        </div>

        @forelse($questions as $question)
            <div class="qna_body" data-ques-id="{{$question->id}}">
                <div class="qna_question" id="ques_id">{{ $question->id }}</div>
                <div class="qna_question" id="ques_title">{{ $question->question_title }}</div>
                <div class="qna_question" id="ques_user">{{ $question->user->user_id }}</div>
                <!-- <div class="qna_question">{{ $question->title }}</div> -->
                <div class="qna_question" id="ques_created">{{ $question->created_at }}</div>
            </div>
        @empty
            <div id="ques_empty">질문이 등록되어있지 않습니다.</div>
        @endforelse

    </div>

    <br>

    <div>
        <button id="add_ques">글 등록</button>
    </div>

    <br>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<link rel="stylesheet" href="/css/qna.css">