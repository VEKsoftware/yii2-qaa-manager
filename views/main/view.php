<?php

use vekqaam\models\base\QaaMainBase;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/**
 * @var $this  View
 * @var $model QaaMainBase
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vekqaam', 'Qaa Main Bases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-main-base-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(
            Yii::t('vekqaam', 'Update'),
            ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']
        ) ?>
        <?php echo Html::a(
            Yii::t('vekqaam', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('vekqaam', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'title:ntext',
            'text:ntext',
            'isHidden:boolean',
            'created_at',
            'updated_at',
            'op_lock',
        ],
    ]) ?>

</div>
