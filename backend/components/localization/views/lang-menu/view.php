<?php

use yii\helpers\Html;

?>

<div class="language_set">
    <?php foreach ($langs as $lang): ?>
        <a data-lang="<?php echo $lang; ?>"
           class="set-lang <?php echo $current === $lang ? 'active' : false; ?>"><span><?php echo $lang; ?></span></a>
    <?php endforeach; ?>
</div>

