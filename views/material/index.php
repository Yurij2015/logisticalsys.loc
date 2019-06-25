<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSerarch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Materials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Material'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'material_name',
            //'idmaterial',
            'count',
            'price',
            'notice',
            'storehouse.storehouse_name',
            'adoptiondate',
//            'responsible_person',

            [
                'attribute' => 'responsible_person',
                'label' => 'Отвественный',
                'value' => function ($model) {
                    return $model->person->secondname . " " . $model->person->name;
                },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
