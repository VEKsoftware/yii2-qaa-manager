<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vekqaam\models\base\QaaCategoryBase */

$this->title = Yii::t('vekqaam', 'Create Qaa Category Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Category Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-category-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
