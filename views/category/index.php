<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use vekqaam\models\QaaCategorySearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var $this         View
 * @var $searchModel  QaaCategorySearch
 * @var $dataProvider ActiveDataProvider
 */

$this->title = Yii::t('vekqaam', 'Qaa Category Bases');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qaa-category-base-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('vekqaam', 'Create Qaa Category Base'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'name',
            'created_at',
            'updated_at',
            'op_lock',

            ['class' => ActionColumn::class],
        ],
    ]); ?>
</div>
