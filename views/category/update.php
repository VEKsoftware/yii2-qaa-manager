<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vekqaam\models\base\QaaCategoryBase */

$this->title = Yii::t('vekqaam', 'Update {modelClass}: ', [
    'modelClass' => 'Qaa Category Base',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Category Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('vekqaam', 'Update');
?>
<div class="qaa-category-base-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
