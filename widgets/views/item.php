<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 07.12.16
 * Time: 11:23
 *
 * @var QaaMain $model
 */
use vekqaam\models\QaaMain;
use yii\helpers\Html;

?>
<p>
<div>
    <span><?php echo Html::encode($model->title) ?></span>
</div>
<div>
    <span><?php echo Html::encode($model->text) ?></span>
</div>
</p>