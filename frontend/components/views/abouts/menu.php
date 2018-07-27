<?php

/**
 * @var $route array
 * @var $key int
 */
?>


<?php if ($route) :; ?>
    <li>
        <a class="<?php echo $route['active'] ? 'active' : ''; ?>" href="<?php echo $route['url'] ?? ''; ?>">
            <span><?php echo $route['title'] ?? '' ?></span>
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