<?php

use backend\components\localization\LanguageMenuWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $post common\models\Post */
/* @var $form yii\widgets\ActiveForm */

$actionId = Yii::$app->controller->action->id; ?>


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
    <p><?php echo Html::encode($this->title) ?></p>

</div>
<?php try {
    echo LanguageMenuWidget::widget();
} catch (Exception $e) {
} ?>
<div class="edit_content_wrap">
    <div class="set_names_field">
        <div class="names_field_elem input">
            <p class="field_placeholder placeholder">Вид поста:</p>
            <?php echo $form->field($post, 'post_type')->dropDownList([
                '' => '',
                'news' => 'Новость',
                'articles' => 'Статья',
            ], ['class' => 'n_f_e_field input_field'])->label(false) ?>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($postTranslation, 'name')->textInput(['class' => 'n_f_e_field input_field translitSet',
                'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Название статьи</p>
        </div>

        <div class="names_field_elem input">
            <?php echo $form->field($postTranslation, 'slug')->textInput(['class' => 'n_f_e_field input_field
                translitResult', 'maxlength' => true])->label(false) ?>
            <p class="field_placeholder placeholder">Адрес статьи</p>
        </div>
    </div>

    <div class="set_names_field gray focus">
        <div class="names_field_elem input">
            <?php echo $form->field($postTranslation, 'title')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Title</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($postTranslation, 'description')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Description</p>
        </div>
        <div class="names_field_elem input">
            <?php echo $form->field($postTranslation, 'keywords')->textarea(['class' => 'n_f_e_field
                input_field'])->label(false) ?>
            <p class="field_placeholder placeholder">Keywords</p>
        </div>
    </div>


    <div class="images_add">
        <div class="images_add_elem images_add_big">
            <div class="images_add_img">
                <?php if (isset($postTranslation->attachment->url) && !empty($postTranslation->attachment->url)): ; ?>
                    <img src="<?php echo $postTranslation->attachment->url ?? ''; ?>"
                         alt="<?php echo $postTranslation->attachment->alt ?? ''; ?>" class="previewResult img_true">
                <?php else: ; ?>
                    <img src="../img/no_photo.jpg"
                         alt="no_photo" class="previewResult img_true">
                <?php endif; ?>
            </div>
            <div class="images_add_control">
                <p class="images_add_title">Картинка статьи</p>
                <label class="file_upload">
                    <input type="file" class="previewSet" name="UploadForm[imageFiles][attachment]">
                    <span class="text_file_upload">Выберите файл</span>
                    <i></i>
                </label>
                <div class="input images_add_alt">
                    <input type="text" placeholder="" class="input_field imgAlt" name="attachment[alt]">
                    <p class="placeholder">Alt:</p>
                </div>
            </div>
            <input class="img_result_data" type="hidden" name="attachment[fileEncoded]">
            <input class="img_name_data" type="hidden" name="attachment[fileName]">
        </div>
        <div class="images_add_elem images_add_small">
            <div class="images_add_img">
                <?php if (isset($postTranslation->thumbnail->url) && !empty($postTranslation->thumbnail->url)): ; ?>
                    <img src="<?php echo isset($postTranslation->thumbnail->url) ? $postTranslation->thumbnail->url : ''; ?>"
                         alt="" class="previewResult img_true">
                <?php else: ; ?>
                    <img src="../img/no_photo.jpg"
                         alt="" class="previewResult img_true">
                <?php endif; ?>
            </div>
            <div class="images_add_control">
                <p class="images_add_title">Миниатюра статьи</p>
                <label class="file_upload">
                    <input type="file" class="previewSet" name="UploadForm[imageFiles][thumbnail]">
                    <span class="text_file_upload">Выберите файл</span>
                    <i></i>
                </label>
                <div class="input images_add_alt">
                    <input type="text" placeholder="" class="input_field imgAlt" name="thumbnail[alt]">
                    <p class="placeholder">Alt:</p>
                </div>
            </div>
            <input class="img_result_data" type="hidden" name="thumbnail[fileEncoded]">
            <input class="img_name_data" type="hidden" name="thumbnail[fileName]">
        </div>
    </div>


    <div class="editor_wrap editor_small">
        <div class="editor_title"><p>Краткое описание</p></div>
        <?php echo $form->field($postTranslation, 'excerpt')->textarea(['class' => 'editor_textarea'])->label(false) ?>
        <div class="editor">
            <?php echo (isset($postTranslation->excerpt) && !empty($postTranslation->excerpt)) ? $postTranslation->excerpt : '' ?>
        </div>
    </div>
    <!--    <div class="editor_wrap editor_big">-->
    <!--        <div class="editor_title"><p>Полный текст</p></div>-->
    <!--        --><?php //echo $form->field($postTranslation, 'content')->textarea(['class' => 'editor_textarea'])->label(false) ?>
    <!--        <div class="editor">-->
    <!--            --><?php //echo (isset($postTranslation->content) && !empty($postTranslation->content)) ? $postTranslation->content : '' ?>
    <!--        </div>-->
    <!--    </div>-->


    <?= $form->field($postTranslation, 'content')->widget(\yii\redactor\widgets\Redactor::class, [
        'clientOptions' => [
            'imageUpload' => \yii\helpers\Url::to(['/redactor/upload/image']),
        ],
    ]) ?>
    <?php if ($actionId === 'update'): ; ?>
        <div class="date_add">
            <div class="date_add_elem">
                <p class="date_add_title">Дата публикации:</p>
                <?php echo $form->field($post, 'created_at')->textInput(['class' => 'calendar'])->label(false) ?>
            </div>
            <div class="date_add_elem">
                <p class="date_add_title">Дата модификации:</p>
                <?php echo $form->field($post, 'updated_at')->textInput(['class' => 'calendar'])->label(false) ?>
            </div>
            <div class="date_add_elem">
                <p class="date_add_title">Статус:</p>
                <?php echo $form->field($post, 'status')->dropDownList([
                    '1' => 'Опубликовать',
                    '0' => 'Не публиковать',

                ])->label(false) ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="buttons_set">
        <?php echo Html::submitButton('<span>ДОБАВИТЬ</span><i></i>', ['class' => 'btn']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

