<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KomunitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komunitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komunitas-index">

    <h1>Halaman Daftar Komunitas</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Komunitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            // 'tanggal',
            // 'cabang',
            // 'gambar',
            // 'latitude',
            // 'longitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
