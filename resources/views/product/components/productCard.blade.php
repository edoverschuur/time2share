<li class="productCard u-list-style-none" data-category-of-product={{$p->category}}>
    <a href="/producten/{{$p->id}}">
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