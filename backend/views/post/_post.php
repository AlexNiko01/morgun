<?php

use yii\helpers\Url;

$status = '';
if ($searchModel->status === 0) {
    $status = 'processed';
}
$translationRu = $searchModel->getPostsTranslationRu()->one();


?>
<div class="tableRow <?php echo $status ?? ''; ?>" data-id="<?php echo $searchModel->id; ?>"
     data-status="<?php echo $searchModel->status; ?>">
    <div class="tableCell">
        <?php if (isset($translationRu->thumbnail->url) && !empty($translationRu->thumbnail->url)): ; ?>
            <img src="<?php echo isset($translationRu->thumbnail->url) ? $translationRu->thumbnail->url : ''; ?>"
                 alt="<?php echo $translationRu->thumbnail->alt ;?>">
        <?php else: ;?>
            <img src="/admin/img/no_photo.jpg"
                 alt="no_photo">
        <?php endif; ?>
        <div class="table_control">
            <a href="<?php echo Url::to(['post/update', 'id' => $searchModel->id]); ?>"
               class="table_control_elem">
                <i class="fa fa-eye"></i>
            </a>
            <div class="table_control_elem btn_control_table" data-type="delete"><i class="fa fa-trash"></i>
            </div>
            <div class="table_control_elem btn_control_table" data-type="set-status"><i class="fa fa-unlock"></i><i
                        class="fa fa-lock"></i>
            </div>
        </div>
    </div>

    <div class="tableCell"><?php echo $translationRu->name; ?></div>
    <div class="tableCell">
        <?php echo date('Y.m.d', strtotime($searchModel['created_at'])); ?>
    </div>
    <div class="tableCell"><?php echo $searchModel->getAuthor()['username']; ?></div>
    <div class="tableCell">
        <?php echo date('Y.m.d', strtotime($searchModel['updated_at'])); ?>
    </div>
</div>

