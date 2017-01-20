<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProposalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idproposal') ?>

    <?= $form->field($model, 'dari') ?>

    <?= $form->field($model, 'ke') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
