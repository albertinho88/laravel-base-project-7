@if(isset($breadcrumb))
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('application_principal') }}">Inicio</a></li>
    <?php echo $breadcrumb; ?>
</ol>
@endif