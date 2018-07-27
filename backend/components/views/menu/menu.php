<?php

/**
 * @var $route array
 * @var $key int
 */
?>

<?php if ($route) :; ?>
    <li class="nav_elem <?php echo $route['active'] ? 'active' : ''; ?>">
        <a class="nav_link" href="<?php echo $route['url'] ?? ''; ?>">
            <?php echo $route['item'] ?? '' ?>
            <span><?php echo $route['title'] ?? '' ?></span>
        </a>
        <?php if ($route['create_url']): ; ?>
            <div class="nav_control">
                <a href="<?php echo $route['create_url']; ?>"><i class="fa fa-plus"></i></a>
            </div>
        <?php endif; ?>
        <?php
        if ($children = $route['children'] ?? null) { ?>
            <ul class="nav_list_more">
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