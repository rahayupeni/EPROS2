<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Perusahaan */

$this->title = $model->idperusahaan;
$this->params['breadcrumbs'][] = ['label' => 'Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idperusahaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idperusahaan], [
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
            'idperusahaan',
            'nama',
            'phone',
            'alamat:ntext',
            'tanggal',
            'cabang',
            'gambar',
            'latitude',
            'longitude',
            'iduser',
            'acara',
            'menerima',
            'jangka_waktu',
            'produk',
            'jasa',
            'timbal_balik',
            'persyaratan',
        ],
    ]) ?>

</div>
