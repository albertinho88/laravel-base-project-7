
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-title">
                Administración
            </li>
            @if(isset($menu_left_per_user))
                <?php echo $menu_left_per_user; ?>
            @endif

            <li class="divider"></li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>