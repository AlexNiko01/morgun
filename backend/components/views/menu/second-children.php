<?php

/**
 * @var $route array
 */
?>

<li class="<?php echo ($route['active']) ? 'active' : ''; ?>">
    <a class=""  href="<?php echo $route['url'] ?? ''; ?>">
        <span><?php echo $route['title'] ?? ''; ?></span>
    </a>
</li>

