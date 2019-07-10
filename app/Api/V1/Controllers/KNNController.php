<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 03/07/19
 * Time: 1:52
 */


namespace App\Api\V1\Controllers;


use App\Data;
use App\DataLatih;
use App\Http\Controllers\Controller;
use App\Result;
use App\SettingTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\Linear\LogisticRegression;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ClassificationReport;


class KNNController extends Controller
{
    public function knn(Request $request)
    {

//        Log::info($request);
        if($request->follower=='true'){
            Log::info($request->follower);
        }

        $classifier = new KNearestNeighbors($request->nilai_k);
//        $logistic = new LogisticRegression();

        $datalatih = Data::get();
        $datauji = DataLatih::get();

        $hasil = [];

        $datatest = [];
        $labeltest = [];

        $setting = new SettingTest($request->all());
        $setting->save();

        foreach ($datalatih as $item) {

            $data = [];

            if ($request->follower=='true') {
                $data[] = $item->total_follower;
            }
            if ($request->following=='true') {
                $data[] = $item->total_following;
            }
            if ($request->total_media_url=='true') {
                $data[] = $item->total_media_url;
            }
            if ($request->total_url=='true') {
                $data[] = $item->total_url;
            }
            if ($request->total_mention=='true') {
                $data[] = $item->total_mention;
            }
            if ($request->total_RT=='true') {
                $data[] = $item->total_RT;
            }
            if ($request->total_hashtag=='true') {
                $data[] = $item->total_hashtag;
            }
            if ($request->total_huruf_besar=='true') {
                $data[] = $item->total_huruf_besar;
            }
            if ($request->total_tanda_baca=='true') {
                $data[] = $item->total_tanda_baca;
            }
            if ($request->total_emoji=='true') {
                $data[] = $item->total_emoji;
            }
            if ($request->total_kata=='true') {
                $data[] = $item->total_kata;
            }
            if ($request->rata2_kata=='true') {
                $data[] = $item->rata2_kata;
            }
            if ($request->total_karakter=='true') {
                $data[] = $item->total_karakter;
            }
            if ($request->rata2_karakter=='true') {
                $data[] = $item->rata2_karakter;
            }
            if ($request->TF_IDF=='true') {
                $data[] = $item->TF_IDF;
            }
//            Log::info($data);

            $label = $item->kelas_asli;
            $datatest[] = $data;
            $labeltest[] = $label;
        }


        $classifier->train($datatest, $labeltest);

        foreach ($datauji as $item) {
            $data = [];

            if ($request->follower=='true') {
                $data[] = $item->total_follower;
            }
            if ($request->following=='true') {
                $data[] = $item->total_following;
            }
            if ($request->total_media_url=='true') {
                $data[] = $item->total_media_url;
            }
            if ($request->total_url=='true') {
                $data[] = $item->total_url;
            }
            if ($request->total_mention=='true') {
                $data[] = $item->total_mention;
            }
            if ($request->total_RT=='true') {
                $data[] = $item->total_RT;
            }
            if ($request->total_hashtag=='true') {
                $data[] = $item->total_hashtag;
            }
            if ($request->total_huruf_besar=='true') {
                $data[] = $item->total_huruf_besar;
            }
            if ($request->total_tanda_baca=='true') {
                $data[] = $item->total_tanda_baca;
            }
            if ($request->total_emoji=='true') {
                $data[] = $item->total_emoji;
            }
            if ($request->total_kata=='true') {
                $data[] = $item->total_kata;
            }
            if ($request->rata2_kata=='true') {
                $data[] = $item->rata2_kata;
            }
            if ($request->total_karakter=='true') {
                $data[] = $item->total_karakter;
            }
            if ($request->rata2_karakter=='true') {
                $data[] = $item->rata2_karakter;
            }
            if ($request->TF_IDF=='true') {
                $data[] = $item->TF_IDF;
            }

            Log::info($data);
            $predict = $classifier->predict([$data]);
            $item->kelas_prediksi = $predict[0];
            $hasil[] = $predict;
            $item->save();

        }


//        $logistic->train($datatest,$labeltest);

//        $predict_logis = $logistic->predict([500, 100, 70000]);

        return response()
            ->json([
                'label_hasil_knn' => $hasil
            ]);

    }

    public function logistic(Request $request)
    {

//        $classifier = new KNearestNeighbors(7);
        $logistic = new LogisticRegression();

        $user = Data::get();
        $datauji = DataLatih::get();

        $datatest = [];
        $labeltest = [];

        $setting = new SettingTest($request->all());
        $setting->save();

        foreach ($user as $item) {

            $data = [];

            if ($request->follower) {
                $data[] = $item->total_follower;
            }
            if ($request->following) {
                $data[] = $item->total_following;
            }
            if ($request->media_url) {
                $data[] = $item->total_media_url;
            }
            if ($request->url) {
                $data[] = $item->total_url;
            }
            if ($request->mention) {
                $data[] = $item->total_mention;
            }
            if ($request->RT) {
                $data[] = $item->total_RT;
            }
            if ($request->hashtag) {
                $data[] = $item->total_hashtag;
            }
            if ($request->huruf_besar) {
                $data[] = $item->total_huruf_besar;
            }
            if ($request->tanda_baca) {
                $data[] = $item->total_tanda_baca;
            }
            if ($request->emoji) {
                $data[] = $item->total_emoji;
            }
            if ($request->kata) {
                $data[] = $item->total_kata;
            }
            if ($request->rata2_kata) {
                $data[] = $item->rata2_kata;
            }
            if ($request->karakter) {
                $data[] = $item->total_karakter;
            }
            if ($request->rata2_karakter) {
                $data[] = $item->rata2_karakter;
            }
            if ($request->TF_IDF) {
                $data[] = $item->TF_IDF;
            }

            $label = $item->kelas_asli;
            $datatest[] = $data;
            $labeltest[] = $label;
        }
//
//        $test1 = [1000, 200, 100000];
//        $test2 = [1500, 250, 108000];
//        $test3 = [1070, 203, 102000];
//
//        $label1 = 'e';
//        $label2 = 'a';
//        $label3 = 'c';
//
//        $labeltest[] = $label1;
//        $labeltest[] = $label2;
//        $labeltest[] = $label3;
//
//        $datatest[] = $test1;
//        $datatest[] = $test2;
//        $datatest[] = $test3;

        $logistic->train($datatest, $labeltest);

        foreach ($datauji as $item) {
            $data = [];

            if ($request->follower) {
                $data[] = $item->total_follower;
            }
            if ($request->following) {
                $data[] = $item->total_following;
            }
            if ($request->media_url) {
                $data[] = $item->total_media_url;
            }
            if ($request->url) {
                $data[] = $item->total_url;
            }
            if ($request->mention) {
                $data[] = $item->total_mention;
            }
            if ($request->RT) {
                $data[] = $item->total_RT;
            }
            if ($request->hashtag) {
                $data[] = $item->total_hashtag;
            }
            if ($request->huruf_besar) {
                $data[] = $item->total_huruf_besar;
            }
            if ($request->tanda_baca) {
                $data[] = $item->total_tanda_baca;
            }
            if ($request->emoji) {
                $data[] = $item->total_emoji;
            }
            if ($request->kata) {
                $data[] = $item->total_kata;
            }
            if ($request->rata2_kata) {
                $data[] = $item->rata2_kata;
            }
            if ($request->karakter) {
                $data[] = $item->total_karakter;
            }
            if ($request->rata2_karakter) {
                $data[] = $item->rata2_karakter;
            }
            if ($request->TF_IDF) {
                $data[] = $item->TF_IDF;
            }

            $predict = $logistic->predict([$data]);
            $item->kelas_prediksi = $predict[0];
            $hasil[] = $predict;
            $item->save();

        }


//        $predict_logis = $logistic->predict([500, 100, 70000]);

        return response()
            ->json([
                'label_hasil_logistic' => $hasil
            ]);
    }

    public function matrix()
    {

        $user = DataLatih::get();

        $actualLabels = [];
        $predictedLabels = [];

        foreach ($user as $item) {
            $actualLabels[] = $item->kelas_asli;
            $predictedLabels[] = $item->kelas_prediksi;
        }

        $report = new ClassificationReport($actualLabels, $predictedLabels);

        $accuracy = Accuracy::score($actualLabels, $predictedLabels);

        $pre = $report->getPrecision();
        $re = $report->getRecall();

        $apre = [];
        foreach ($pre as $item) {
            $apre[] = $item;
        }

        $are = [];
        foreach ($re as $item) {
            $are[] = $item;
        }

//        $data = array_fill_keys(array('re_a'),'');

        $data = array();
        $data['re_a'] = $are[0];
        $data['re_c'] = $are[1];
        $data['re_e'] = $are[2];
        $data['re_n'] = $are[3];
        $data['re_o']= $are[4];

        $data['pre_a'] = $apre[0];
        $data['pre_c']= $apre[1];
        $data['pre_e']= $apre[2];
        $data['pre_n']= $apre[3];
        $data['pre_o']= $apre[4];

        $data['akurasi'] = $accuracy;

        $hasil = new Result($data);
        $hasil->save();

        return response()
            ->json([
                'status' => $are[0]
            ]);


    }

}