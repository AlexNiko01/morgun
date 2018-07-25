<li class="nav_elem <?php echo $key === 0 ? 'active' : ''; ?>">
    <?php if (isset($route)): ; ?>
        <a href="<?= $route['url'] ? \yii\helpers\Url::to([$route['url']]) : '' ?>" class="nav_link">
            <?php echo $route['item'] ? $route['item'] : ''; ?>
            <span><?php echo $route['title'] ? $route['title'] : ''; ?></span>
        </a>
        <?php if (isset($route['create_url'])): ; ?>
            <div class="nav_control">
                <a href="<?php echo \yii\helpers\Url::to([$route['create_url']]); ?>">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($route['children'])): ; ?>
        <ul class="nav_list_more">
            <?php foreach ($route['children'] as $page): ; ?>
                <?php if (!empty($page['url'] && !empty($page['title']))): ?>
                    <li>
                        <a href="<?= $page['url'] ? \yii\helpers\Url::to([$page['url']]) : '' ?>" class="nav_link">
                            <span><?php echo isset($page['title']) ? $page['title'] : ''; ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</li>
