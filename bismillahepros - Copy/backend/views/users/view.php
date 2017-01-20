<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */
if ($user->level == "perusahaan"){
    $this->title = $perusahaan->nama;
}else {
    $this->title = $komunitas->nama;
}
?>
<head>
    <title>GoogleMap Sederhana</title>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAU4LMF6u-hRjzR4pDgRsr6pWl3IXTVqzI"></script>
    <script type="text/javascript">
        var peta;
        function peta_awal(){
            <?php
            if ($user->level == "perusahaan"){
            ?>
                var lat = <?php echo $perusahaan->latitude ?>;
                var lng = <?php echo $perusahaan->longitude?>;
            <?php
            }else {
            ?>
                var lat = <?php echo $komunitas->latitude ?>;
                var lng = <?php echo $komunitas->longitude?>;
            <?php
            }
            ?>
            // definisikan koordinat awal untuk peta
            var awal = new google.maps.LatLng(lat,lng);
//            var awal = new google.maps.LatLng(-6.912889,107.609787);
            // peta option, berupa setting bagaimana peta itu akan muncul
            var petaoption = {zoom: 14,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP};
            // menuliskan koordinat peta dan memunculkannya ke halaman web
            peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);
            // marker
            tanda = new google.maps.Marker({position: awal, map: peta });}
    </script>
</head>
<body onload="peta_awal()">
    <div class="users-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $user->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php
        if ($user->level == "perusahaan"){
            ?>
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="/bismillahepros/<?= $perusahaan->gambar ?>" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h2 class="widget-user-username"><b><?= $perusahaan->nama ?></b></h2>
                    <h4 class="widget-user-desc"><?= $user->level ?></h4>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">
                                <b>Nama Akun Users</b><BR>
                                <h4><?= $user->username ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Alamat Email</b><BR>
                                <h4><?= $user->email ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Nomor telepone</b><BR>
                                <h4><?= $perusahaan->phone ?></h4>
                            </a>
                        </li><li>
                            <a href="#">
                                <b>Tanggal Berdiri</b><BR>
                                <h4><?= $perusahaan->tanggal ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Kantor Cabang</b><BR>
                                <h4><?= $perusahaan->cabang ?></h4>
                            </a>
                        </li>
                        <li>
                            <a>
                                <b>Lokasi</b> <BR>
                                <div id="map_canvas" style="width:100%; height:500px" ></div>

                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <?php
        }else {
            ?>
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle" src="/bismillahepros/<?= $komunitas->gambar ?>" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h2 class="widget-user-username"><b><?= $komunitas->nama ?></b></h2>
                    <h4 class="widget-user-desc"><?= $user->level ?></h4>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">
                                <b>Nama Akun Users</b><BR>
                                <h4><?= $user->username ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Alamat Email</b><BR>
                                <h4><?= $user->email ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Nomor telepone</b><BR>
                                <h4><?= $komunitas->phone ?></h4>
                            </a>
                        </li><li>
                            <a href="#">
                                <b>Tanggal Berdiri</b><BR>
                                <h4><?= $komunitas->tanggal ?></h4>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <b>Kantor Cabang</b><BR>
                                <h4><?= $komunitas->cabang ?></h4>
                            </a>
                        </li>
                        <li>
                            <a>
                                <b>Lokasi</b> <BR>
                                <div id="map_canvas" style="width:100%; height:500px" ></div>

                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <?php
        }
        ?>
    </div>

</body>

