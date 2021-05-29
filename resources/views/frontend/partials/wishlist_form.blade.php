<form action="{{route('wishlist.store')}}" method="POST">
    @csrf
    <input type="hidden" name="product_id"
           value="{{$product->id}}">
    <input type="hidden" name="quantity"
           value="1">
    <input type="hidden" name="title"
           value="{{$product->title}}">
    <input type="hidden" name="price"
           value="{{$product->price}}">
    <button class="text-gray-6 font-size-13 wishlist-btn"><i
            class="ec ec-favorites mr-1 font-size-15"></i>
        Add
        to
        Wishlist
    </button>
</form>
