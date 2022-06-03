@extends('default')

@section('title')
    {{$product->name}}
@endsection

@include('product.components.nav')

@include('product.components.productPageCard')

