@extends('default')

@section('title')
    {{$user->name}}
@endsection

@include('product.components.nav')

<!-- ZIJN PRODUCTEN -->
@foreach($user->products as $p)
    @if ($p->state == "Lendable")
        <h1 class="profile__h1">{{$user->name}} zijn producten</h1>
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

<!-- ZIJN UITGELEENDE PRODUCTEN -->
@foreach($user->products as $p)
    @if ($p->state == "Lending")
        <h1 class="profile__h1">{{$user->name}} zijn uitgeleende producten</h1>
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

<!-- ZIJN REVIEWS -->
@foreach($review as $r)
    @if ($r->user_id == $user->id)
        <h1 class="profile__h1">{{$user->name}} zijn reviews</h1>
        @break
    @endif
@endforeach
<ul class="u-grid-12 u-grid-gap-2">
@foreach($review as $r)
    @if ($r->user_id == $user->id)
            @include('product.components.reviews')
    @endif
@endforeach
</ul>

<!-- Admin gebruiker blokkeren -->
@if (Auth::check() && Auth::user()->isAdmin())
    @if ($user->role == "User")
        <form class="adminButtonSection" action="/profiel/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <button class="adminButton" type="submit">Blokkeer deze gebruiker</button>
        </form>
    @elseif ($user->role == "Guest")
        <form class="adminButtonSection" action="/profiel/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <button class="adminButton" type="submit">Onblokkeer deze gebruiker</button>
        </form>
    @endif
@endif




