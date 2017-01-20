<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Chat */

$this->title = 'Update Chat: ' . $model->idchat;
$this->params['breadcrumbs'][] = ['label' => 'Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idchat, 'url' => ['view', 'id' => $model->idchat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
