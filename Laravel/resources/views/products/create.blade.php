@extends('headers.header')

@section('content')

    <form id="postProduct" class="form__auth">
        {!! csrf_field() !!}
        
        <div class="form-group {{ $errors->has('question_title') ? 'has-error' : '' }}">
            <label for="question_title">제목</label>
            <input type="text" name="question_title" id="question_title" class="form-control" value="{{ old('question_title') }}" autofocus />
            {!! $errors->first('question_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('question_content') ? 'has-error' : '' }}">
            <label for="question_content">질문 내용</label>
            <input type="text" name="question_content" id="question_content" class="form-control" value="{{ old('question_content') }}" />
            {!! $errors->first('question_content', '<span class="form-error">:message</span>') !!}
        </div>
        
        <div class='form-group'>
            <button type="submit" id="saveProduct">제품 등록</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>