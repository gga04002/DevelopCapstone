@extends('headers.header')

@section('content')


    <div>주문 페이지입니다.</div>
    <br>

    @forelse($products as $product)
        <div class="productDiv" data-pro-id="{{ $product->product_id }}">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div>제품 명 : {{ $product->product_title }}</div>
            <div>제품 가격: {{ $product->product_price }}</div>

            <button class="watchProduct">제품 보기</button>
            @if(Auth::user())
                @if(Auth::user()->admin)
                    <button class="alterProduct">제품 수정</button>
                    <button class="deleteProduct">제품 삭제</button>
                @endif
            @endif
        </div>
        <br>
    @empty
        <div>제품이 없습니다.</div>
    @endforelse

    @if(Auth::user())
        @if (Auth::user()->admin)
            <br>
            <input id="addProduct" type="button" value="제품 추가"/>
        @endif
    @endif

    @include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/product.js"></script>