<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CuentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuenta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cuenta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
               'attribute' => 'Numero',
               'value' => function ($model, $key, $index, $column) {
                   return Html::a(
                       $model->num,
                       ['movimientos/create', 'cuenta_id' => $model->num]
                   );
               },
               'format' => 'html',
           ],
            'fecha_apertura',
            'usuario.nombre',

            [
               'attribute' => 'Numero',
               'value' => function ($model, $key, $index, $column) {
                   return Html::a(
                       $model->num,
                       ['movimientos/create', 'cuenta_id' => $model->num],
                       ['class' => 'btn-sm btn-primary']
                   );
               },
               'format' => 'html',
           ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
