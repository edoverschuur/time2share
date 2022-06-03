@extends('default')

@section('title')
    {{$product->name}}
@endsection

@include('product.components.nav')

@if (Auth::id() == $product->user_id)
    <form class="productReturningCard" action="/aannemen/{{$product->id}}" method="POST">
        @csrf
        <figure class="productReturningCard__figure">
            <img class="productReturningCard__image" src="{{$product->image}}"/>
        </figure>
        <header class="productReturningCard__header u-flex-v-center">
            <h2 class="productReturningCard__heading"> {{$product->name}} </h2>
        </header>

        <section class="productReturningCard__labelSection">
            <label class="productReturningCard__label" for="review">Laat een review achter voor de lener!</label>
        </section>
        <section class="productReturningCard__inputSection">
            <input class="productReturningCard__input" name="review" id="review" type="text" 
            placeholder="Hoe ging de gebruiker met het product om?" required />
        </section>
        <section class="productReturning__buttonSection">
            <button class="productReturning__button u-flex-v-center" type="submit">Accepteer product</button>
        </section>
    
        </form>
@endif