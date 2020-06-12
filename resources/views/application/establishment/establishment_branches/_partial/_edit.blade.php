<form id="editEstablishmentBranchForm"
      name="editEstablishmentBranchForm"
      method="POST"
      prevalidation="{{ route('update_establishment_branch_pre_validation') }}"
      action="{{ route('update_establishment_branch') }}"
      class="ajaxJsonForm">

    <input type="hidden" id="establishment_branch_id" name="establishment_branch_id" value="{{ $establishment_branch->establishment_branch_id }}">
    @include('application.establishment.establishment_branches._partial._form')

</form>