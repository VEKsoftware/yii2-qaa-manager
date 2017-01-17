<?php

use vekqaam\models\QaaMain;
use yii\grid\ActionColumn;
use vekqaam\models\QaaMainSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var $this           View
 * @var $searchModel    QaaMainSearch
 * @var $dataProvider   ActiveDataProvider
 * @var $isHiddenDD     array
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

            'id',
            [
                'attribute' => 'categoryName',
                'label' => Yii::t('vekqaam', 'Category Name')
            ],
            'title:ntext',
            'text:ntext',
            [
                'attribute' => 'isHidden',
                'filter' => Html::activeDropDownList($searchModel, 'isHidden', $isHiddenDD),
                'format' => 'boolean'
            ],
            [
                'attribute' => 'created_at',
                'filter' => false
            ],
            [
                'attribute' => 'updated_at',
                'filter' => false
            ],

            ['class' => ActionColumn::class],
        ],
    ]); ?>
</div>
