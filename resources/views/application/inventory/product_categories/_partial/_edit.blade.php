<form id="editProductCategoryForm" 
        name="editProductCategoryForm" 
        method="POST"
        prevalidation="{{ route('update_product_category_pre_validation') }}" 
        action="{{ route('update_product_category') }}" 
        class="ajaxJsonForm">
    <input type="hidden" id="product_category_id" name="product_category_id" value="{{ $product_category->product_category_id }}">
    @include('application.inventory.product_categories._partial._form')
</form>