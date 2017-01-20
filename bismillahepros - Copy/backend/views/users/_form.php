<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList([ 'perusahaan' => 'Perusahaan', 'komunitas' => 'Komunitas', 'instansi' => 'Instansi', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'vemail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vsms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vbukti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vupdate')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
