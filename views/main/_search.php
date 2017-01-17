<?php

use vekqaam\models\QaaMainSearch;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var $this  View
 * @var $model QaaMainSearch
 * @var $form  ActiveForm
 */
?>

<div class="qaa-main-base-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'category_id') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'text') ?>

    <?php echo $form->field($model, 'isHidden')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('vekqaam', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('vekqaam', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
