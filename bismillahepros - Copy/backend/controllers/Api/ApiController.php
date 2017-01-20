<?php
/**
 * Created by PhpStorm.
 * User: Ion Smart
 * Date: 1/5/2017
 * Time: 10:19 PM
 */

namespace backend\controllers\Api;


use backend\models\Chat;
use backend\models\File;
use backend\models\Komunitas;
use backend\models\Perusahaan;
use backend\models\Proposal;
use backend\models\Users;
use Smalot\PdfParser\Parser;
use Yii;
use yii\db\Exception;
use yii\rest\ActiveController;
use yii\web\UploadedFile;

class ApiController extends ActiveController {
    public $modelClass = "backend\models\Users";


    // Login
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        $model = Users::findOne(["username" => $post["username"]]);
        if($model->level == 1){
            $model2 = Perusahaan::findOne(["iduser" => $model->id]);
        }else{
            $model2 = Komunitas::findOne(["iduser" => $model->id]);
        }
        $json = array("error" => FALSE);
        if ($model) {
            if ($model->password == md5($post["password"])) {
                $json["error"] = false;
                $json["uid"] = $model->id;
                echo json_encode($json);
            } else {
                $json["error"] = true;
                $json["tag"] = "login";
                $json["succes"] = 0;
                $json["error_msg"] = "Password salah";
                echo json_encode($json);
            }
        } else {
            $json["error"] = true;
            $json["tag"] = "login";
            $json["succes"] = 0;
            $json["error_msg"] = "User belum terdaftar";
            echo json_encode($json);
        } //return whole user model including auth_key or you can just return $model["auth_key"];
    }

    // Create User
    public function actionCreate() {
        $post = Yii::$app->request->post();
        $model = new Users();
        $username = Users::findOne(["username" => $post["username"]]);
        $email = Users::findOne(["email" => $post["email"]]);
        $json = array("error" => FALSE);
        if($model->load(Yii::$app->request->post(), '')){
            if ($username){
                $json["error"] = true;
                $json["error_msg"] = "Username sudah terdaftar";
                return $json;
            }
            elseif ($email){
                $json["error"] = true;
                $json["error_msg"] = "Email sudah terdaftar";
                return $json;
            }
            else{
                $model->password = md5($model->password);
                $model->authKey = rand(000000,999999);
                $model->tanggal = date("Y-m-d");
                $model->vemail = 0;
                $model->vsms = 0;
                $model->vupdate = 0;
                $model->vbukti = 0;
                if($model->save(false)){
                    $json["error"] = false;
                    $json["uid"] = $model->id;
                    return $json;
                }
            }
        }
    }

    public function actionCperusahaan() {
        $post = Yii::$app->request->post();
        $model = new Users();
        $perusahaan = new Perusahaan();
        $username = Users::findOne(["username" => $post["username"]]);
        $email = Users::findOne(["email" => $post["email"]]);
        $json = array("error" => FALSE);
        if($model->load(Yii::$app->request->post(), '')){
            if ($username){
                $json["error"] = true;
                $json["error_msg"] = "Username sudah terdaftar";
                return $json;
            }
            elseif ($email){
                $json["error"] = true;
                $json["error_msg"] = "Email sudah terdaftar";
                return $json;
            }
            else{
                $model->level = "perusahaan";
                $model->password = md5($model->password);
                $model->authKey = rand(000000,999999);
                $model->tanggal = date("Y-m-d");
                $model->vemail = 0;
                $model->vsms = 0;
                $model->vupdate = 0;
                $model->vbukti = 0;
                $model->save(false);
                $perusahaan->load(Yii::$app->request->post(), '');
                $perusahaan->gambar = "data/foto/noimage.png";
                $perusahaan->iduser = $model->id;
                $phone = Perusahaan::findOne(["phone" => $post["phone"]]);
                $json = array("error" => FALSE);
                if ($phone){
                    $json["error"] = true;
                    $json["error_msg"] = "Nomor Telephone Telah Digunakan";
                    return $json;
                }else {
                    $perusahaan->save(false);
                    $json["error"] = false;
                    $json["uid"] = $perusahaan->idperusahaan;
                    return $json;
                }
            }
        }
    }

    public function actionCkomunitas() {
        $post = Yii::$app->request->post();
        $model = new Users();
        $perusahaan = new Komunitas();
        $username = Users::findOne(["username" => $post["username"]]);
        $email = Users::findOne(["email" => $post["email"]]);
        $json = array("error" => FALSE);
        if($model->load(Yii::$app->request->post(), '')){
            if ($username){
                $json["error"] = true;
                $json["error_msg"] = "Username sudah terdaftar";
                return $json;
            }
            elseif ($email){
                $json["error"] = true;
                $json["error_msg"] = "Email sudah terdaftar";
                return $json;
            }
            else{
                $perusahaan->load(Yii::$app->request->post(), '');
                $perusahaan->gambar = "data/foto/noimage.png";
                $phone = Perusahaan::findOne(["phone" => $post["phone"]]);
                $json = array("error" => FALSE);
                if ($phone){
                    $json["error"] = true;
                    $json["error_msg"] = "Nomor Telephone Telah Digunakan";
                    return $json;
                }else {
                    $model->password = md5($model->password);
                    $model->authKey = rand(000000,999999);
                    $model->tanggal = date("Y-m-d");
                    $model->vemail = 0;
                    $model->vsms = 0;
                    $model->vupdate = 0;
                    $model->vbukti = 0;
                    $perusahaan->save(false);
                    $model->save(false);
                    $json["error"] = false;
                    return $json;
                }
            }
        }
    }

    //Create next perusahaan
    public function actionNperusahaan($id) {
        $model = Perusahaan::findOne($id);
        $model->load(Yii::$app->request->post(), '');
        $json = array("error" => FALSE);
        $json["error"] = false;
        $model->save(false);
        return $json;
    }

    //Create Lokasi
    public function actionLokasi($id){
        $post = Yii::$app->request->post();
        $komunitas = Komunitas::findOne($id);
        $perusahaan = Perusahaan::findOne($id);
        $json = array("error" => FALSE);
        if ($komunitas){
            $komunitas->load(Yii::$app->request->post(), '');
            $komunitas->save(false);
            $json["error"] = false;
            return $json;
        }elseif($perusahaan){
            $perusahaan->load(Yii::$app->request->post(), '');
            $perusahaan->save(false);
            $json["error"] = false;
            return $json;
        }
    }

    //Lihat Komunitas
    public function actionKomunitas() {
        $model = new Komunitas();
        $post = Yii::$app->request->post();
        $model->load(Yii::$app->request->post(),'');
        $model->gambar = "data/foto/noimage.png";
        $phone = Komunitas::findOne(["phone" => $post["phone"]]);
        $json = array("error" => FALSE);
        if ($phone){
            $json["error"] = true;
            $json["error_msg"] = "Nomor Telephone Telah Digunakan";
            return $json;
        }else {
            $json["error"] = false;
            $model->save(false);
            return $json;
        }
    }


    public function actionDuser($id){
        $user = Users::findOne($id);
        $json = array("error" => FALSE);
        $json["error"] = false;
        $json["uid"] = $user->id;
        $json["user"]["username"] = $user->username;
        $json["user"]["email"] = $user->email;
        $json["user"]["password"] = $user->password;
        $json["user"]["authKey"] = $user->authKey;
        $json["user"]["statusemail"] = $user->vemail;
        $json["user"]["statusbukti"] = $user->vbukti;
        $json["user"]["statussms"] = $user->vsms;
        $json["user"]["statusupdate"] = $user->vupdate;
        $json["user"]["level"] = $user->level;
        if ($user->level == "perusahaan"){
            $perusahaan = Perusahaan::findOne(['iduser' => $id]);
            $json["user"]["nama"] = $perusahaan->nama;
            $json["user"]["phone"] = $perusahaan->phone;
            $json["user"]["alamat"] = $perusahaan->alamat;
            $json["user"]["tanggal"] = $perusahaan->tanggal;
            $json["user"]["cabang"] = $perusahaan->cabang;
            $json["user"]["gambar"] = $perusahaan->gambar;
            $json["user"]["latitude"] = $perusahaan->latitude;
            $json["user"]["longitude"] = $perusahaan->longitude;
            $json["user"]["acara"] = $perusahaan->acara;
            $json["user"]["menerima"] = $perusahaan->menerima;
            $json["user"]["jangka_Waktu"] = $perusahaan->jangka_waktu;
            $json["user"]["timbal_balik"] = $perusahaan->timbal_balik;
            $json["user"]["sponsor"] = $perusahaan->sponsor;
            return $json;
        }else {
            $perusahaan = Komunitas::findOne(['iduser' => $id]);
            $json["user"]["nama"] = $perusahaan->nama;
            $json["user"]["phone"] = $perusahaan->phone;
            $json["user"]["alamat"] = $perusahaan->alamat;
            $json["user"]["tanggal"] = $perusahaan->tanggal;
            $json["user"]["cabang"] = $perusahaan->cabang;
            $json["user"]["gambar"] = $perusahaan->gambar;
            $json["user"]["latitude"] = $perusahaan->latitude;
            $json["user"]["longitude"] = $perusahaan->longitude;
            return $json;
        }
    }

        public function actionKirimsms($id){
        $D_user = Users::findOne($id);
        $json = array("error" => FALSE);
        if ($D_user->level == "perusahaan" ){
            $model2 = Perusahaan::find()->where(['iduser' => $id])->one();
        }else {
            $model2 = Komunitas::find()->where(['iduser' => $id])->one();
        }
        // Script Kirim SMS Api Zenziva

        $telepon = $model2->phone;
        $userkey = "cz9s3i";
        $passkey = "ishom123";
        $message ="Hallo," . $D_user->username. ". kode verifikasi anda adalah" . $D_user->authKey;
        $url = "http://reguler.zenziva.net/apps/smsapi.php";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=' . $userkey . '&passkey=' . $passkey . '&nohp=' . $telepon . '&pesan='.urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        if($results){
            $json["error"] = false;
            $json["massage"] = "verifikasi sudah dikirim pada nomor anda";
            return $json;
        }else {
            $json["error"] = true;
            $json["error_msg"] = "Verifikasi gagal terkirim";
            return $json;
        }
    }

    public function actionKirimemail($id){
        $user = Users::findOne($id);
        $json = array("error" => FALSE);
        // Script Kirim SMS Api Zenziva

        $sukses = Yii::$app->mailer->compose()
            ->setFrom('aplikasiku@yii2.com')
            ->setTo($user->email)
            ->setSubject("Kode verifikasi epros")
            ->setHtmlBody("<h2>Hello, ". $user->username . "!</h2><br>This is your verivication number : <b>". $user->authKey ."</b> .");
        if($sukses->send()){
            $json["error"] = false;
            $json["massage"] = "verifikasi sudah dikirim pada email anda";
            return $json;
        }else {
            $json["error"] = true;
            $json["massage"] = "Verifikasi gagal terkirim";
            return $json;
        }
    }


    public function actionUploadberkas(){
        $model = new File();
        $user = Users::findOne(Yii::$app->user->id);

        if ($user->level ==1 ){
            $model2 = Perusahaan::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }else {
            $model2 = Komunitas::find()->where(['iduser' => Yii::$app->user->id ])->one();
        }
        if (!empty($_POST)) {
            $model->imageFile = $_POST['File']['imageFile'];
            $data = \yii\web\UploadedFile::getInstances($model, 'imageFile');

            $message = Yii::$app->mailer->compose()
                ->setFrom(['Epros Verification'])
                ->setTo("rahayupeni20@gmail.com")
                ->setSubject($user->username ." telah mengirim berkas bukti \n ionsmart.co/epruslawas/web/users/profile?username=".$user->username)
                ->setHtmlBody("Epros Uhuy");
            $model2->urlbukti = "";
            foreach ($data as $file) {
                $filename = '../data/bukti/' . Yii::$app->user->id . md5($file->baseName). '.' . $file->extension; # i'd suggest adding an absolute path here, not a relative.
                $model2->bukti = $model2->bukti .','.  $filename;
                $file->saveAs($filename);
                $message->attach($filename);
            }
            $message->send();
            $user->vbukti = 1;
            $user->save();
            $model2->save(false);
            $json = array("error" => FALSE);
            $json["error"] = false;
            return $json;
            // its better if you relegate such a code to your model class
        }
        return $this->render('uploadfile', ['model'=>$model]);
    }

    public function actionCekproposal($username) {
        $parser = new Parser();
        $file = new File();
        $model = new Proposal();
        $user = Users::findOne($username);
        $file_path = "data/proposal/";
        $filename = $_FILES["proposal"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        $newfilename = md5($file_basename) . $file_ext;
        $json = array();
        if(move_uploaded_file($_FILES["proposal"]["tmp_name"], $file_path . $newfilename)) {
            $pdf = $parser->parseFile('data/proposal/'. $newfilename);
            $text = $pdf->getText();
            $datatext = array(
                "Jadwal dan Lokasi Kegiatan",
                "Susunan Kegiatan",
                "Peserta",
                "Penyelenggara",
                "Rencana Anggaran",
                "Paket Sponsorship",
                "Syarat dan Ketentuan Sponsorship",
                "Hak Sponsor",
                "Jadwal dan Lokasi Kegiatan",
                "Donatur",
                "Susunan Panitia", " Acara", "sebagai", "Tanggal", "Anggaran Dana", "Pendahuluan", "Latar Belakang", "Tujuan", "Penutup", "bantuan", "Panitia", "Penanggungjawab", "Ketua Pelaksana", "Mengetahui", "Menyetujui", "Tempat"
            );
            $index1 = false;
            $count = 0;
            $i = 0;

            foreach ($datatext as $item) {
                if (strpos($text, $item) !== false){
                    $count++;
                }
                $i++;
            }
            $rate = ($count/sizeof($datatext))*100;
            if ($rate > 80){
                $index1 = true;
                $model->load(Yii::$app->request->post(), '');
                $model->status = 0;
                $model->date = date("Y-m-d");
                $model->file = $newfilename;
                $model->level = 0;
                $model->dari = $username;
                $model->save(false);

                $this->actionBuatpesan($username, 'admin', $username. " Megirim proposal kepada ".$model->ke . "dengan link proposal dibawah ini \n
                <a href='cdo.ionsmart.co/bismillahepros/data/proposal/".$newfilename ."'>Disini</a>");
            }else {
                unlink($file_path . $newfilename);  
                $json["error"] = true;
                $json["message"] = "Proposal yang anda kirim tidak sesuai";
                return $json;
            }

            $json["error"] = $index1;
            $json["index1"] = $count;
            $json["rate"] = $rate;
            $json["isi array"] = sizeof($datatext);
            return $json;
        } else{
            $json["error"] = true;
            $json["message"] = "Tolong masukan file";
            return $json;
        }
    }

//    public function actionCekproposal($username) {
//        $parser = new Parser();
//        $file = new File();
//        $model = new Proposal();
//        $user = Users::findOne($username);
//        $file_path = "data/proposal/";
//        $filename = $_FILES["proposal"]["name"];
//        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
//        $file_ext = substr($filename, strripos($filename, '.')); // get file name
//        $newfilename = md5($file_basename) . $file_ext;
//        $json = array();
//        $pdf = $parser->parseFile($_FILES['proposal']['tmp_name']);
//        $text = $pdf->getText();
//        $datatext = array(
//            "Jadwal dan Lokasi Kegiatan",
//            "Susunan Kegiatan",
//            "Peserta",
//            "Penyelenggara",
//            "Rencana Anggaran",
//            "Paket Sponsorship",
//            "Syarat dan Ketentuan Sponsorship",
//            "Hak Sponsor",
//            "Jadwal dan Lokasi Kegiatan",
//            "Donatur",
//            "Susunan Panitia", " Acara", "sebagai", "Tanggal", "Anggaran Dana", "Pendahuluan", "Latar Belakang", "Tujuan", "Penutup", "bantuan", "Panitia", "Penanggungjawab", "Ketua Pelaksana", "Mengetahui", "Menyetujui", "Tempat"
//        );
//        $index1 = false;
//        $count = 0;
//        $i = 0;
//
//        foreach ($datatext as $item) {
//            if (strpos($text, $item) !== false){
//                $count++;
//            }
//            $i++;
//        }
//        $rate = ($count/sizeof($datatext))*100;
//        if ($rate > 90){
//            $index1 = true;
//            $model->load(Yii::$app->request->post(), '');
//            $model->status = 0;
//            $model->date = date("Y-m-d");
//            $model->file = $newfilename;
//            $model->level = 0;
//            $model->dari = $username;
//            $model->save(false);
//            move_uploaded_file($_FILES["proposal"]["tmp_name"], $file_path . $newfilename);
//
//            $this->actionBuatpesan($username, 'admin', $username. " Megirim proposal kepada ".$model->ke . "dengan link proposal dibawah ini \n
//                <a href='cdo.ionsmart.co/bismillahepros/data/proposal/".$newfilename ."'>Disini</a>");
//            $json["error"] = false;
//            $json["message"] = "Proposal berhasil terkirim";
//            return $json;
//
//        }else {
//            $json["error"] = true;
//            $json["message"] = "Proposal yang anda kirim tidak sesuai";
//            return $json;
//        }
//    }

    public function actionTry(){
//        if(isset($_FILES['pdf']['name'])) {
            $model = new Proposal();
            $file_path = "data/proposal/";
            $filename = $_FILES["pdf"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
            $file_ext = substr($filename, strripos($filename, '.')); // get file name
            $newfilename = md5($file_basename) . $file_ext;
            $response = array();
            try {
                //saving the file
                move_uploaded_file($_FILES["pdf"]["tmp_name"], $file_path . $newfilename);
                $model->file = $newfilename;

                //adding the path and name to database
                if ($model->save(false)) {

                    //filling response array with values
                    $response['error'] = false;
                    $response['message'] = "mantap abizzzzz";
                }
                //if some error occurred
            } catch (Exception $e) {
                $response['error'] = true;
                $response['message'] = $e->getMessage();
            }
//            move_uploaded_file($_FILES["proposal"]["tmp_name"], $file_path . $newfilename);
//        }else {
//            $response['error']=true;
//            $response['message']='Please choose a file';
//        }

        //displaying the response
        echo json_encode($response);

    }

    public function actionDisplaypesan($username) {
        $chat = Chat::find()->where(['kepada' => $username])->asArray()->all();
        return $chat;
    }

    public function actionBuatpesan($dari, $kepada, $pesan) {
        $chat = new Chat();
        $chat->kepada = $kepada;
        $chat->dari = $dari;
        $chat->pesan = $pesan;
        $chat->tanggal = date("Y-m-d");
        $chat->status = 0;
        $chat->save();
    }
}