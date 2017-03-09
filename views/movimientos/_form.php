<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_aparicion')->textInput() ?>

    <?= $form->field($model, 'concepto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'importe')->textInput() ?>

    <?= $form->field($model, 'cuenta_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
