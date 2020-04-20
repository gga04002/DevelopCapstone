@extends('headers.header')

@section('content')

    <div>질문 수정</div>

    <form id="edit_question" class="form__auth" data-up-id="{{$question->id}}">
        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}
    
        <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
            
        </div>
        
        <div class="form-group {{ $errors->has('question_title') ? 'has-error' : '' }}">
            <label for="question_title">제품 명</label>
            <input type="text" name="question_title" id="question_title" class="form-control" value="{{ old('question_title', $question->question_title) }}" autofocus />
            {!! $errors->first('question_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('question_content') ? 'has-error' : '' }}">
            <label for="question_content">제품 설명</label>
            <input type="text" name="question_content" id="question_content" class="form-control" value="{{ old('question_content', $question->question_content) }}" />
            {!! $errors->first('question_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group'>
            <button type="submit" id="update_ques">질문 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/question.js"></script>
<link rel="stylesheet" href="/css/qna.css">