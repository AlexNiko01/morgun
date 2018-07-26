<?php

use backend\components\localization\LanguageMenuWidget;
use common\models\Gallery;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'edit_content main_wrap',
        'enctype' => ''
    ]
]); ?>
<div class="title_block">
    <p><?php echo Html::encode($this->title) ?></p>
</div>
<?php try {
    echo LanguageMenuWidget::widget();
} catch (Exception $e) {
} ?>

<div class="edit_content_wrap">
    <div class="set_names_field">
        <div class="names_field_elem input">
            <?php echo $form->field($modelTranslation, 'name')->textInput(['class' => 'n_f_e_field input_field translitSet', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Название страницы</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($modelTranslation, 'slug')->textInput(['class' => 'n_f_e_field input_field translitResult', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Адрес страницы</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($model, 'order')->textInput(['class' => 'n_f_e_field input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Порядковый номер</p>
        </div>

    </div>

    <div class="set_names_field gray focus">
        <div class="names_field_elem input">
            <?php echo $form->field($modelTranslation, 'title')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Title</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($modelTranslation, 'description')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Description</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($modelTranslation, 'keywords')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Keywords</p>
        </div>
    </div>

    <div class="date_add">
        <div class="date_add_elem">
            <p class="date_add_title">Статус:</p>
            <?php echo $form->field($model, 'status')->dropDownList([
                '1' => 'Опубликовать',
                '0' => 'Не публиковать',

            ])->label(false) ?>
        </div>
<!--        <div class="date_add_elem">-->
<!--            <p class="date_add_title">Родительская страница:</p>-->
<!--            --><?php //echo $form->field($model, 'parent_id')->dropDownList(
//                $parents
//            )->label(false) ?>
<!---->
<!--        </div>-->
    </div>

    <div class="buttons_set">
        <?php echo Html::submitButton(Yii::t('app', '<span>Сохранить</span><i></i>'), ['class' => 'btn']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
