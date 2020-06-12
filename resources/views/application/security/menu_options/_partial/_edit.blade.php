<form id="editMenuOptionForm"
      name="editMenuOptionForm"
      method="POST"
      prevalidation="{{ route('update_menu_option_pre_validation') }}"
      action="{{ route('update_menu_option') }}"
      class="ajaxJsonForm">

    <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu_option->menu_id }}">
    @include('application.security.menu_options._partial._form')

</form>