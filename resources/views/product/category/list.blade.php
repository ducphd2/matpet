@extends('layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection


@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- cate -->
    <div class="col-sm-3">
                    <div class="left-sidebar">
                    <h2>Danh Mục</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($categorys as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        @if($category->categoryChildrent->count())
                            <a href="">
                                {{ $category->name }}
                            </a>
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                                <span class="badge pull-right">
                                   <i class="fa fa-plus"></i>
                                </span>
                            </a>
                            
                            @else
                            <a href="
                            {{ route('category.product',['slug' => $categoryChilrent->slug, 'id' => $categoryChilrent->id]) }}
                            "
                            >
                                <!-- <span class="badge pull-right">
                                </span> -->
                                {{ $category->name }}
                            </a>
                        @endif
                        </h4>
                    </div>


                    <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categoryChildrent as $categoryChilrent)
                                    <li>
                                        <a href="{{ route('category.product',
                                        ['slug' => $categoryChilrent->slug, 'id' => $categoryChilrent->id]) }}">
                                            {{ $categoryChilrent->name }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            @endforeach

        </div><!--/category-products-->


    </div>
</div>
                <!-- end cate -->

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản Phẩm</h2>

                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt=""/>
                                            <h2>{{ number_format($product->price) }} VNĐ</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</a>
                                        </div>
                                        <div class="product-overlay">
                                        <a href="" style="
                                            display: block;
                                            width: 100%;
                                            height: 100%;
                                        "></a>
                                            <div class="overlay-content">
                                                <a href=""><h2>{{ number_format($product->price) }} VNĐ</h2></a>
                                                <a href=""><p>{{ $product->name }}</p></a>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        @endforeach


                       {{$products->links()}}

                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection




