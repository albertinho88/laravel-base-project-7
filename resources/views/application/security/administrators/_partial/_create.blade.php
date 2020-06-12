<form id="createUserForm"
      name="createUserForm"
      method="POST"
      prevalidation="{{ route('store_user_pre_validation') }}"
      action="{{ route('store_user') }}"
      class="ajaxJsonForm">

    @include('application.security.users._partial._form')

</form>