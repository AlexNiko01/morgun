<?php

use backend\components\localization\LanguageMenuWidget;
use common\models\Lang;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Gallery;
use \common\models\Service;

/* @var $this yii\web\View */
/* @var $model common\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ], 'options' => [
        'class' => 'edit_content main_wrap',
        'enctype' => 'multipart/form-data'
    ]]); ?>

<div class="title_block">
    <p><?= Html::encode($this->title) ?></p>
</div>
<?php try {
    echo LanguageMenuWidget::widget();
} catch (Exception $e) {
} ?>

<div class="edit_content_wrap">
    <div class="set_names_field">
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'name')->textInput(['class' => 'n_f_e_field input_field translitSet', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Название услуги</p>
        </div>

        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'slug')->textInput(['class' => 'n_f_e_field input_field translitResult', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Адрес услуги</p>
        </div>


    </div>
    <div class="set_names_field">
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'attachment_url')->textInput(['class' => 'n_f_e_field input_field ', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Ссылка на картинку записи</p>
        </div>
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'thumbnail_url')->textInput(['class' => 'n_f_e_field input_field', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Ссылка на превью записи</p>
        </div>


    </div>
    <div class="set_names_field">
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'heading')->textarea(['class' => 'n_f_e_field input_field', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Заголовок</p>
        </div>
        <div class="names_field_elem input">
            <?= $form->field($service, 'order')->textInput(['class' => 'n_f_e_field input_field', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Порядок вывода на общей странице</p>
        </div>
    </div>

    <div class="set_names_field gray focus">
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'title')->textarea(['class' => 'n_f_e_field input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Title</p>
        </div>
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'description')->textarea(['class' => 'n_f_e_field input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Description</p>
        </div>
        <div class="names_field_elem input">
            <?= $form->field($serviceTranslation, 'keywords')->textarea(['class' => 'n_f_e_field input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Keywords</p>
        </div>

    </div>
    <div class="editor_wrap editor_small">
        <div class="editor_title"><p>Краткое описание</p></div>
        <?php echo $form->field($serviceTranslation, 'excerpt')->textarea(['class' => 'editor_textarea'])->label(false) ?>
        <div class="editor">
            <?php echo (isset($serviceTranslation->excerpt) && !empty($serviceTranslation->excerpt)) ? $serviceTranslation->excerpt : '' ?>
        </div>
    </div>
    <div class="editor_wrap editor_big">
        <div class="editor_title"><p>Полный текст</p></div>
        <textarea class="editor_textarea" cols="30" rows="10" name="ServiceTranslation[content]"></textarea>
        <div class="editor">
            <?php echo $serviceTranslation->content ?? ''; ?>
        </div>
    </div>

    <div class="buttons_set">
        <?= Html::submitButton('<span>ДОБАВИТЬ</span><i></i>', ['class' => 'btn']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

