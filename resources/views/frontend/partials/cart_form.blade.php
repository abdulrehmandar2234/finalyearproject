<form action="{{route('cart.store')}}" method="POST">
    @csrf
    <input type="hidden" name="product_id"
           value="{{$product->id}}">
    <input type="hidden" name="quantity"
           value="1">
    <input type="hidden" name="title"
           value="{{$product->title}}">
    <input type="hidden" name="price"
           value="{{$product->price}}">
    <button type="submit"
            class="btn-add-cart btn-primary transition-3d-hover">
        <i class="ec ec-add-to-cart"></i></button>
</form>
