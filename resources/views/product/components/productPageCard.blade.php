<article class="productPageCard">
    <figure class="productPageCard__figure">
        <img class="productPageCard__image" src="{{$product->image}}"/>
    </figure>
    <section class="productPageCard__textArea u-flex-v-center">
        <p> {{$product->description}} </p>
    </section>
    @if (Auth::id() == $product->user_id)
        <section class="productPageCard__textArea">
            <p> Dit is uw eigen product </p>
        </section>
    @elseif ($product->state == "Lending" || $product->state == "Pending")
        <section class="productPageCard__textArea">
            <p> Dit product is momenteel niet beschikbaar </p>
        </section>
        @if ($product->state == "Lending")
            <section class="productPageCard__timeData">
                @if ($product->state == "Lending")
                    <p>Dit product moet op {{gmdate("Y-m-d\ H:i:s",$product->lendTimePlusTime)}} terug zijn<p>
                @endif
            </section>
        @endif
    @else
        <form class="productPageCard__buttonSection" action="/producten/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')
            <button class="productPageCard__button" type="submit">Leen dit product</button>
        </form>
        <section class="productPageCard__timeData u-flex-v-center">
            @if ($product->state == "Lendable")
                @if ($product->lendTime >= 2)
                    <p>Je kan dit product {{$product->lendTime}} dagen lenen<p>
                @else
                    <p>Je kan dit product {{$product->lendTime}} dag lenen<p>
                @endif
            @endif
        </section>
    @endif
    <p class="productPageCard__owner">
        Dit product wordt uitgeleend door
        <a href="/profiel/{{$product->user_id}}">
            {{$user[$product->user_id-1]->name}}.
        </a>
    </p>
    @if (Auth::check() && Auth::user()->isAdmin())
        <form class="adminButtonSection" action="/delete{{$product->id}}" method="POST">
            @csrf
            @method('PUT')
            <button class="adminButton" type="submit">Verwijder dit product</button>
        </form>
    @endif
</article>