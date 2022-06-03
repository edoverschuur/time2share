@extends('default')

@section('title', 'Maak Product')

@include('product.components.nav')



@section('content')
<article class="create-form">

    <form class="create-form__form" action="/producten" method="POST" enctype="multipart/form-data">
        @csrf
        <header class="create-form__header">
            <h1>Voeg een product toe</h1>
        </header>
        
        <section class="create-form__section">
            <label for="name">Naam</label>
            <input class="create-form__input" name="name" id="name" type="text" placeholder="Naam product"/>
        </section>

        <section class="create-form__section">
            <label for="description">Omschrijving</label>
            <input class="create-form__input" name="description" id="description" type="text" placeholder="Omschrijving product"/>
        </section>

        <section class="create-form__section">
            <label for="image">Afbeelding</label>
            <input class="create-form__input" type="file" name="image" id=""image>
        </section>

        <section class="create-form__section">
            <label for="category">Categorie</label>
            <select class="create-form__input" id="category" name="category">
                @foreach($category_of_product as $category_of_product)
                    <option value="{{$category_of_product->category}}"> {{$category_of_product->category}} </option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <label for="lendTime">Uitleen tijd (In dagen)</label>
            <input  class="create-form__input" name="lendTime" 
                    id="lendTime" type="number" min="1" max="7"
                    placeholder="max 7 dagen" />
        </section>

        <button class="create-form__button" type="submit">Submit</button>
    </form>
</article>
@endsection