<?php

/**
 * @var $route array
 */
?>

<li class="<?php echo ($route['active']) ? 'active' : ''; ?>">
    <a  class=""  href="<?php echo $route['url'] ?? ''; ?>">
        <span><?php echo $route['title'] ?? ''; ?></span>
    </a>
    <?php
    if ($children = $route['children'] ?? null) : ?>

        <ul class="nav_list_more">
            <?php foreach ($children as $child) {
                echo $this->render('second-children', [
                    'route' => $child
                ]);
            } ?>
        </ul>
    <?php endif; ?>
</li>

