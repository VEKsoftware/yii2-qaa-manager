<?php

use vekqaam\models\base\QaaCategoryBase;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var $this  View
 * @var $model QaaCategoryBase
 * @var $form  ActiveForm
 */
?>

<div class="qaa-category-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord
                ? Yii::t('vekqaam', 'Create')
                : Yii::t('vekqaam', 'Update'),
            [
                'class' => $model->isNewRecord
                    ? 'btn btn-success'
                    : 'btn btn-primary'
            ]
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
