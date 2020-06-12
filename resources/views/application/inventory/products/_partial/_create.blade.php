<form id="createProductForm" 
        name="createProductForm" 
        method="POST" 
        prevalidation="{{ route('store_product_pre_validation') }}"
        action="{{ route('create_product') }}" 
        class="ajaxJsonForm" >
    @include('application.inventory.products._partial._form')
</form>