<?php

use yii\helpers\Html;

?>

<div class="languages">
    <?php foreach ($langs as $lang): ?>
        <?php $class = $lang->url == $current->url ? 'active' : ''; ?>
        <?php if ($lang->url === 'ru'): ; ?>
            <?php echo Html::a($lang->url, Yii::$app->getRequest()->buildLangUrl($lang->url, Yii::$app->getRequest()->getLangUrl())) ?>
        <?php else :; ?>
            <?php echo Html::a($lang->url, '/' . Yii::$app->getRequest()->buildLangUrl($lang->url, Yii::$app->getRequest()->getLangUrl())) ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>