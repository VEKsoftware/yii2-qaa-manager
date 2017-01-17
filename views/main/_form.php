<?php

use vekqaam\models\QaaMain;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var $this       View
 * @var $model      QaaMain
 * @var $form       ActiveForm
 * @var $categoryDD array
 */
?>

<div class="qaa-main-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'category_id')->dropDownList($categoryDD) ?>

    <?php echo $form->field($model, 'title')->textarea(['rows' => 2]) ?>

    <?php echo $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php if (!$model->isNewRecord): ?>
        <?php echo $form->field($model, 'isHidden')->checkbox() ?>
    <?php endif; ?>

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
