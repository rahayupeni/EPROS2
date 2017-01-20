<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Aktifitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktifitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kepada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
