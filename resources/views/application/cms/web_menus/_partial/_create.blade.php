<form id="createMenuOptionForm"
      name="createMenuOptionForm"
      method="POST"
      prevalidation="{{ route('store_menu_option_pre_validation') }}"
      action="{{ route('store_menu_option') }}"
      class="ajaxJsonForm">

    @include('application.security.menu_options._partial._form')

</form>