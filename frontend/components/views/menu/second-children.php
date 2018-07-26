<?php

/**
 * @var $route array
 */
?>

<li class="<?php echo $route['active'] ? 'active' : ''; ?>">

    <a href="<?php echo $route['url'] ?? ''; ?>">
        <?php echo $route['title'] ?? ''; ?>
    </a>
</li>

