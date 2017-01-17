<?php

use vekqaam\models\base\QaaMainBase;
use yii\helpers\Html;
use yii\web\View;


/**
 * @var $this       View
 * @var $model      QaaMainBase
 * @var $categoryDD array
 */

$this->title = Yii::t('vekqaam', 'Create Qaa Main Base');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Main Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-main-base-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'categoryDD' => $categoryDD]) ?>

</div>
