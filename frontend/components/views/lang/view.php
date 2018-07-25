<?php

use yii\helpers\Html;

?>

<div class="languages">
    <?php foreach ($langs as $lang): ?>
        <?php $class = $lang->url == $current->url ? 'active' : ''; ?>
        <?php echo Html::a($lang->url, '/' . Yii::$app->getRequest()->buildLangUrl($lang->url, Yii::$app->getRequest()->getLangUrl()), ['class' => $class]) ?>
    <?php endforeach; ?>
</div>