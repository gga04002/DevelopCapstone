@extends('headers.header')

@section('content')

    <div id="showDiv">
        
        <div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }}">
            <label for="product_title">제품 명</label>
            <div id="product_title" class="form-control">{{ $product->product_title }}</div>
        </div>
        
        <br>

        <div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
            <label for="product_price">제품 가격</label>
            <div id="product_price" class="form-control">{{ $product->product_price }}</div>

        </div>
        
        <br>

        <div class="form-group {{ $errors->has('product_content') ? 'has-error' : '' }}">
            <label for="product_content">제품 설명</label>
            <div id="product_content" class="form-control">{{ $product->product_content }}</div>
        </div>

        <br>
        
        <div>
            <div>작성일 : {{ $product->created_at }}</div>
            <div>수정일 : {{ $product->updated_at }}</div>
        </div>

        <br>

        <div>
            @if(Auth::user())
                <button id="order" data-ord-id="{{ $product->product_id }}">주문하기</button>
            @endif
            <button id="backProducts">목록으로</button>
        </div>
        
        @if(Auth::user())
            @if(Auth::user()->admin)
                <br>

                <div data-pro-id="{{ $product->product_id }}">
                    <button class="alterProduct">제품 수정</button>
                    <button class="deleteProduct">제품 삭제</button>
                </div>
            @endif
        @endif

    </div>

@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>