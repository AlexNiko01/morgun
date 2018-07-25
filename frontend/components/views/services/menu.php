<?php

/**
 * @var $route array
 * @var $key int
 */
?>
<?php if ($route) :; ?>
    <li>
        <a class="<?php echo $route['active'] ? 'active' : ''; ?>" href="<?php echo $route['url'] ?? ''; ?>">
            <?php echo $route['title'] ?? '' ?>
            <?php if ($children = $route['children'] ?? null) { ?>
                <i class="open_more_menu"></i>
            <?php }; ?>
        </a>
        <?php
        if ($children = $route['children'] ?? null) { ?>
            <ul>
                <?php foreach ($children as $child) {
                    echo $this->render('first-children', [
                        'route' => $child
                    ]);
                } ?>
            </ul>
        <?php }
        ?>
    </li>
<?php endif; ?>