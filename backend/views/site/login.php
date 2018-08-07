<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAsset;

$this->title = 'Авторизация';

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<!--BEGIN ENTER-->
<div class="enter_block">
    <div class="enter_block_wrap">
        <p class="enter_block_title"><?= Html::encode($this->title) ?></p>
        <p class="enter_block_text">Пожалуйста, авторизируйтесь</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'login-form']); ?>
        <div class="input focus">
            <i class="input_icon fa fa-user"></i>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' =>
            'input_field'])->label(false) ?>
            <p class="placeholder">Логин</p>
        </div>
        <div class="input">
            <i class="input_icon fa fa-key"></i>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'input_field'])->label(false) ?>
            <p class="placeholder">Пароль</p>
        </div>
        <div class="form_enter_bottom">
            <a href="#">Забыли пароль?</a>
            <?= Html::submitButton('<span>Login</span><i></i>', ['class' => 'btn', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<!--BEGIN ALL POPUP-->

<div class="popup_info" id="popup_warning">
    <div class="popup_info_wrap">
        <i class="popup_info_close icon_close"></i>
        <p class="popup_info_title">Предупреждение!</p>
        <div class="popup_info_text">

        </div>
        <button class="btn"><span>ok</span><i></i></button>
    </div>
</div>
<!--END ALL POPUP-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
