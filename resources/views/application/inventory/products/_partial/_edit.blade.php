<form id="editProductForm" 
        name="editProductForm" 
        method="POST" 
        prevalidation="{{ route('update_product_pre_validation') }}"
        action="{{ route('update_product') }}" 
        class="ajaxJsonForm">
    <input type="hidden" id="product_id" name="product_id" value="{{ $product->product_id }}">
    @include('application.inventory.products._partial._form')
</form>