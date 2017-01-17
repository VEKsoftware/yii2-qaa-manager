<?php

use vekqaam\models\base\QaaCategoryBase;
use yii\helpers\Html;
use yii\web\View;


/**
 * @var $this  View
 * @var $model QaaCategoryBase
 */

$this->title = Yii::t('vekqaam', 'Create Qaa Category Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Category Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-category-base-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', ['model' => $model]) ?>

</div>
