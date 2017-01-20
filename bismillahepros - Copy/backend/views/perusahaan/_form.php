<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Perusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perusahaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'cabang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iduser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jangka_waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timbal_balik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persyaratan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
