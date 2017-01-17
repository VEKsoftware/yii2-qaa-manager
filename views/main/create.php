<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vekqaam\models\base\QaaMainBase */

$this->title = Yii::t('vekqaam', 'Create Qaa Main Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Main Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-main-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
