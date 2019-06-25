<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Storehouse */

$this->title = Yii::t('app', 'Update Storehouse: {name}', [
    'name' => $model->idstorehouse,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Storehouses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idstorehouse, 'url' => ['view', 'id' => $model->idstorehouse]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="storehouse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
