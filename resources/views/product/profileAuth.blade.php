@extends('default')

@section('title')
    {{$user->name}}
@endsection

@include('product.components.nav')

<!-- TERUGKOMENDE PRODUCTEN -->
@foreach($user->products as $p)
    @if ($p->state == "Pending")
        <h1 class="profile__h1">Terugkerende producten</h1>
        @break
    @endif
@endforeach
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($user->products as $p)
        @if ($p->state == "Pending")
            <li class="productCard u-list-style-none">
                <a href="/aannemen/{{$p->id}}">
                    <article class="productCard__article">
                        <header class="productCard__header u-flex-v-center">
                            <h2 class="productCard__heading">{{$p->name}}</h2>
                        </header>
                        <figure class="productCard__figure">
                            <img class="productCard__image" src="{{$p->image}}">
                        </figure>
                        <section class="productCard__textArea u-flex-v-center">
                            <p class="productCard__text">{{$p->description}}</p>
                        </section>
                    </article>
                </a>
            </li>
        @endif
    @endforeach
</ul>

<!-- MIJN PRODUCTEN -->
@foreach($user->products as $p)
    @if ($p->state == "Lendable")
        <h1 class="profile__h1">Mijn producten</h1>
        @break
    @endif
@endforeach
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($user->products as $p)
        @if ($p->state == "Lendable")
            @include('product.components.productCard')
        @endif
    @endforeach
</ul>

<!-- MIJN UITGELEENDE PRODUCTEN -->
@foreach($user->products as $p)
    @if ($p->state == "Lending")
        <h1 class="profile__h1">Mijn uitgeleende producten</h1>
        @break
    @endif
@endforeach
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($user->products as $p)
        @if ($p->state == "Lending")
            @include('product.components.productCard')
        @endif
    @endforeach
</ul>

<!-- PRODUCTEN DIE JE AAN HET LENEN BENT -->
@foreach($product as $p)
    @if ($p->lender == Auth::id() && $p->state != "Pending")
        <h1 class="profile__h1">Producten die je aan het lenen bent</h1>
        @break
    @endif
@endforeach
<ul class="u-grid-12 u-grid-gap-2">
    @foreach($product as $p)
        @if ($p->lender == Auth::id() && $p->state != "Pending")
            @include('product.components.productCard')
        @endif
    @endforeach
</ul>

<!-- MIJN REVIEWS -->
@foreach($review as $r)
    @if ($r->user_id == Auth::id())
        <h1 class="profile__h1">Mijn reviews</h1>
        @break
    @endif
@endforeach

@foreach($review as $r)
    @if ($r->user_id == Auth::id())
        @include('product.components.reviews')
    @endif
@endforeach





