<form id="editWebMenuForm"
      name="editWebMenuForm"
      method="POST"
      prevalidation="{{ route('update_web_menu_pre_validation') }}"
      action="{{ route('update_web_menu') }}"
      class="ajaxJsonForm">

    <input type="hidden" id="menu_id" name="menu_id" value="{{ $web_menu->menu_id }}">
    @include('application.cms.web_menus._partial._form')

</form>