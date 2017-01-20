<?php

use kartik\file\FileInput;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Proposal */

$this->title = 'Update Proposal: ' . $model->idproposal;
$this->params['breadcrumbs'][] = ['label' => 'Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproposal, 'url' => ['view', 'id' => $model->idproposal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proposal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="proposal-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dari')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ke')->textInput(['maxlength' => true]) ?>

        <?php
        echo FileInput::widget([
            'name' => 'attachment_49[]',
            'options'=>[
                'multiple'=>true
            ],
            'pluginOptions' => [
                'initialPreview'=>[
                    "https://doctoradoagrarias.files.wordpress.com/2015/04/ico-pdf.jpg"
                ],
                'initialPreviewAsData'=>true,
                'initialCaption'=>"The Moon and the Earth",
                'initialPreviewConfig' => [
                    ['caption' => $model->file, 'size' => '1287883'],
                ],
                'overwriteInitial'=>false,
                'maxFileSize'=>2800
            ]
        ]);
        ?>

        <?= $form->field($model, 'level')->dropDownList(['0' => 'Tidak Ada','1' => 'Sangat Buruk','2' => 'Buruk','3' => 'Cukup','4' => 'Baik','5' => 'Sangat Baik' ]) ?>

        <?= $form->field($model, 'k_pengirim')->textarea() ?>

        <?= $form->field($model, 'k_admin')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
