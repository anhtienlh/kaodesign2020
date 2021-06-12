<?php
$sidebar = ambient_elated_get_sidebar();
?>
<div class="eltdf-column-inner">
    <aside class="eltdf-sidebar">
        <?php
            if (is_active_sidebar($sidebar)) {
                dynamic_sidebar($sidebar);
            }
        ?>
    </aside>
</div>