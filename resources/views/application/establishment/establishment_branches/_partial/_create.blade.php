<form id="createEstablishmentBranchForm"
      name="createEstablishmentBranchForm"
      method="POST"
      prevalidation="{{ route('store_establishment_branch_pre_validation') }}"
      action="{{ route('store_establishment_branch') }}"
      class="ajaxJsonForm" >

    @include('application.establishment.establishment_branches._partial._form')

</form>