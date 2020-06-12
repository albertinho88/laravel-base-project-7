<form id="editRoleForm"
      name="editRoleForm"
      method="POST"
      prevalidation="{{ route('update_role_pre_validation') }}"
      action="{{ route('update_role') }}"
      class="ajaxJsonForm">

    <input type="hidden" id="role_id" name="role_id" value="{{ $role->role_id }}">
    @include('application.security.roles._partial._form')

</form>