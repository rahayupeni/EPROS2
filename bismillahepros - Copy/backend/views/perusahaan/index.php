<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perusahaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-index">

    <h1>halaman Daftar Perusahaan</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idperusahaan',

            [
                'attribute' => 'gambar',
                'format' => 'html',
                'label' => 'Foto Profile',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['gambar'],
                        ['width' => '100px']);
                },
            ],
            'nama',
            'phone',
            'alamat:ntext',
            'tanggal',
             'cabang',
//             'latitude',
//             'longitude',
//             'iduser',
//             'acara',
//             'menerima',
//             'jangka_waktu',
//             'produk',
//             'jasa',
//             'timbal_balik',
//             'persyaratan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
