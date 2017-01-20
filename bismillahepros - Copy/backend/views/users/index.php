<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1>Halaman Daftar Pengguna</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            'email:email',
//            'password',
//            'authKey',
             'level',
            [
                'attribute' => 'vemail',
                'format' => 'html',
                'label' => 'Verifikasi Email',
                'value' => function ($data) {
                    if ($data['vemail'] == 1){
                        return "Telah diverifikasi";
                    }else {
                        return "Belum verifikasi";
                    }
                },
            ],
            [
                'attribute' => 'vsms',
                'format' => 'html',
                'label' => 'Verifikasi Sms',
                'value' => function ($data) {
                    if ($data['vsms'] == 1){
                        return "Telah diverifikasi";
                    }else {
                        return "Belum verifikasi";
                    }
                },
            ],
            [
                'attribute' => 'vbukti',
                'format' => 'html',
                'label' => 'Verifikasi Bukti Perusahaan/ Komunitas',
                'value' => function ($data) {
                    if ($data['vbukti'] == 2){
                        return "Telah diverifikasi";
                    }elseif($data['vbukti'] == 1) {
                        return "Verifikasi diterima";
                    }else {
                        return "Belum verifikasi";
                    }
                },
            ],
            [
                'attribute' => 'vupdate',
                'format' => 'html',
                'label' => 'Update Foto Profile',
                'value' => function ($data) {
                    if ($data['vupdate'] == 1){
                        return "Telah diverifikasi";
                    }else {
                        return "Belum verifikasi";
                    }
                },
            ],
//            $selisih = ((abs(strtotime ($date1) - strtotime ($date2)))/(60*60*24));
            [
                'attribute' => 'tanggal',
                'format' => 'html',
                'label' => 'Kadaluarsa',
                'value' => function ($data){
                    $date = date("Y-m-d");
                    if ($data["vbukti"] == 1 && $data["vsms"] == 1 && $data["vupdate"] == 1 && $data["vemail"] == 1){
                        return "User sudah active";
                    }else {
                        return (((abs(strtotime ($data['tanggal']) - strtotime($date) ))/(60*60*24))). " hari lagi";
                    }

                }
            ],
            [
                'attribute' => '',
                'format' => 'html',
                'label' => 'Kirim Pesan',
                'value' => function ($data){
                    return Html::a('Kirim Pesan', ['lihat', 'id' => $data['id']],['class' => 'btn btn-success']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
