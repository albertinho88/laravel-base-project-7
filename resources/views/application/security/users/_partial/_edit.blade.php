<form id="editUserForm"
      name="editUserForm"
      method="POST"
      prevalidation="{{ route('update_user_pre_validation') }}"
      action="{{ route('update_user') }}"
      class="ajaxJsonForm">

    <input type="hidden" id="user_id" name="user_id" value="{{ $user->user_id }}">
    @include('application.security.users._partial._form')

</form>