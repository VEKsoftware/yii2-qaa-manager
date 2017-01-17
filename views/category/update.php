<?php

use vekqaam\models\base\QaaCategoryBase;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this  View
 * @var $model QaaCategoryBase
 */

$this->title = Yii::t('vekqaam', 'Update {modelClass}: ', ['modelClass' => Yii::t('vekqaam', 'Qaa Category Base')]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Category Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('vekqaam', 'Update');
?>
<div class="qaa-category-base-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', ['model' => $model]) ?>

</div>
