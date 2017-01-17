<?php

use vekqaam\models\base\QaaMainBase;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this  View
 * @var $model QaaMainBase
 * @var $categoryDD array
 */

$this->title = Yii::t('vekqaam', 'Update {modelClass}: ', ['modelClass' => Yii::t('vekqaam', 'Qaa Main Base')]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Main Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('vekqaam', 'Update');
?>
<div class="qaa-main-base-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'categoryDD' => $categoryDD]) ?>

</div>
