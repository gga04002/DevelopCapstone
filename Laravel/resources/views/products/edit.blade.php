@extends('headers.header')

@section('content')

    <div>글 수정</div>

    <form id="editProduct" class="form__auth" data-up-id="{{$product->product_id}}">
        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}
    
        <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
            
        </div>
        
        <div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }}">
            <label for="product_title">제품 명</label>
            <input type="text" name="product_title" id="product_title" class="form-control" value="{{ old('product_title', $product->product_title) }}" autofocus />
            {!! $errors->first('product_title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
            <label for="product_price">제품 가격</label>
            <input type="text" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" name="product_price" id="product_price" class="form-control" value="{{ old('product_price', $product->product_price) }}" />
            {!! $errors->first('product_price', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('product_content') ? 'has-error' : '' }}">
            <label for="product_content">제품 설명</label>
            <input type="text" name="product_content" id="product_content" class="form-control" value="{{ old('product_content', $product->product_content) }}" />
            {!! $errors->first('product_content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class='form-group'>
            <button type="submit" id="updateProduct">제품 수정</button>
        </div>

    </form>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>