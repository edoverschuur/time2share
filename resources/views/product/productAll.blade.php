@extends('default')

@section('title', 'Producten')

@include('product.components.nav')

@include('product.components.filter')

<ul class="u-grid-12 u-grid-gap-2">
        @foreach($product as $p)
            @if ($p->state == "Lendable")
                @include('product.components.productCard')
            @endif
        @endforeach
</ul>



