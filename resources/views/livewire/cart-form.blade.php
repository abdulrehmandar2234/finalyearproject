<div>
    <form wire:submit.prevent="storeCart">
        @include('frontend.partials.success_error_msg')
        <input type="hidden" name="product_id" wire:model.defer="product_id">
        <input type="hidden" name="quantity" wire:model.defer="quantity">
        <input type="hidden" name="title" wire:model.defer="title">
        <input type="hidden" name="price" wire:model.defer="price">
        <button class="btn-add-cart btn-primary transition-3d-hover">
            <i class="ec ec-add-to-cart"></i></button>
    </form>
</div>
