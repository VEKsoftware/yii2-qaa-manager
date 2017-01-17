<?php

use vekqaam\models\QaaCategorySearch;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var $this  View
 * @var $model QaaCategorySearch
 * @var $form  ActiveForm
 */
?>

<div class="qaa-category-base-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'created_at') ?>

    <?php echo $form->field($model, 'updated_at') ?>

    <?php echo $form->field($model, 'op_lock') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('vekqaam', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('vekqaam', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
