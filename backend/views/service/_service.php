<?php

use yii\helpers\Url;

?>
<div class="services_elem servicesElem" data-id="<?php echo $serviceTranslation->service_id; ?>">
    <p class="services_name"><?php echo $serviceTranslation->name; ?></p>
    <?php if (isset($serviceTranslation->service->serviceItems) && !empty($serviceTranslation->service->serviceItems)):
    ; ?>
    <i class="open_services"></i>
    <?php endif; ?>
    <div class="services_elem_control">
        <a href="<?php echo Url::to(['service/update', 'id' => $serviceTranslation->service_id]); ?>"
           class="btn_dote"><i class="fa fa-eye"></i></a>
        <div class="btn_dote controlServicesBtn" data-type="delete">
            <i class="fa fa-trash"></i>
        </div>
    </div>
    <?php if (isset($serviceTranslation->service->serviceItems) && !empty($serviceTranslation->service->serviceItems)):
    ; ?>
    <div class="services_elem_under" data-url="service-item">
        <?php foreach ($serviceTranslation->service->serviceItems as $item): ; ?>
        <div class="s_e_u_elem servicesElem">
            <p class="s_e_u_name"><?php echo $item->getServiceItemTranslationRu()['title'] ?? ''; ?></p>
            <div class="s_e_u_control">
                <a href="<?php echo Url::to(['service-item/update', 'id' => $item->id]); ?>"
                   class="btn_dote"><i class="fa fa-eye"></i></a>
                <div class="btn_dote btn_control_table controlServicesBtn" data-type="delete"><i
                        class="fa fa-trash"></i></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>