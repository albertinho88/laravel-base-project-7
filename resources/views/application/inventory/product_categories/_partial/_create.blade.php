<form id="createProductCategoryForm" 
      name="createProductCategoryForm" 
      method="POST" 
      prevalidation="{{ route('store_product_category_pre_validation') }}"
      action="{{ route('create_product_category') }}" 
      class="ajaxJsonForm">
    @include('application.inventory.product_categories._partial._form')
</form>