@foreach ($products as $product)
    <p><a href="/product/{{$product->id}}">{{$product->name}}</a> </p>
@endforeach
