<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use vekqaam\models\QaaMainSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var $this         View
 * @var $searchModel  QaaMainSearch
 * @var $dataProvider ActiveDataProvider
 */

$this->title = Yii::t('vekqaam', 'Qaa Main Bases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-main-base-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('vekqaam', 'Create Qaa Main Base'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'category_id',
            'title:ntext',
            'text:ntext',
            'isHidden:boolean',
            // 'created_at',
            // 'updated_at',
            // 'op_lock',

            ['class' => ActionColumn::class],
        ],
    ]); ?>
</div>
