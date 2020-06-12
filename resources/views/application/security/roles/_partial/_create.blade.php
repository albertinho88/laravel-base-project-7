<form id="createRoleForm"
      name="createRoleForm"
      method="POST"
      prevalidation="{{ route('store_role_pre_validation') }}"
      action="{{ route('store_role') }}"
      class="ajaxJsonForm">

    @include('application.security.roles._partial._form')

</form>