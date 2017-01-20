<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Komunitas */

$this->title = $model->idkomunitas;
$this->params['breadcrumbs'][] = ['label' => 'Komunitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komunitas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idkomunitas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idkomunitas], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idkomunitas',
            'iduser',
            'nama',
            'phone',
            'alamat:ntext',
            'tanggal',
            'cabang',
            'gambar',
            'latitude',
            'longitude',
        ],
    ]) ?>

</div>
