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
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\Linear\LogisticRegression;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ClassificationReport;


class KNNController extends Controller
{
    public function knn(){

        $classifier = new KNearestNeighbors(3);

        $user = Data::get();

        $datatest = [];
        $labeltest = [];

        foreach ($user as $item) {
            $data = [
                $item->total_follower,
                $item->total_following,
                // $item->total_media_url,
                // $item->total_url,
                // $item->total_mention,
                // $item->total_RT,
                // $item->total_hashtag,
                // $item->total_huruf_besar,
                // $item->total_tanda_baca,
                // $item->total_emoji,
                $item->total_kata,
                $item->rata2_kata,
                $item->total_karakter,
                $item->rata2_karakter,
                $item->TF_IDF,
            ];
            $label = $item->kelas_asli;
            $datatest[] = $data;
            $labeltest[] = $label;
        }


        $classifier->train($datatest, $labeltest);
        $datauji = DataLatih::get();

        $hasil = [];

        foreach ($datauji as $item) {
            $data = [
                $item->total_follower,
                $item->total_following,
                // $item->total_media_url,
                // $item->total_url,
                // $item->total_mention,
                // $item->total_RT,
                // $item->total_hashtag,
                // $item->total_huruf_besar,
                // $item->total_tanda_baca,
                // $item->total_emoji,
                $item->total_kata,
                $item->rata2_kata,
                $item->total_karakter,
                $item->rata2_karakter,
                $item->TF_IDF,
            ];
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

    public  function logistic(){

//        $classifier = new KNearestNeighbors(7);
        $logistic = new LogisticRegression();

        $user = Data::get();

        $datatest = [];
        $labeltest = [];

        foreach ($user as $item) {
            $data = [
                $item->total_follower,
                $item->total_following,
                $item->total_media_url,
                $item->total_url,
                $item->total_mention,
                $item->total_RT,
                $item->total_hashtag,
                $item->total_huruf_besar,
                $item->total_tanda_baca,
                $item->total_emoji,
                $item->total_kata,
                $item->rata2_kata,
                $item->total_karakter,
                $item->rata2_karakter,
                $item->TF_IDF,
            ];
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

        $logistic->train($datatest,$labeltest);
        $datauji = DataLatih::get();

        $hasil = [];

        foreach ($datauji as $item) {
            $data = [
                $item->total_follower,
                $item->total_following,
                $item->total_media_url,
                $item->total_url,
                $item->total_mention,
                $item->total_RT,
                $item->total_hashtag,
                $item->total_huruf_besar,
                $item->total_tanda_baca,
                $item->total_emoji,
                $item->total_kata,
                $item->rata2_kata,
                $item->total_karakter,
                $item->rata2_karakter,
                $item->TF_IDF,
            ];
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

    public function matrix(){

        $user = DataLatih::get();

        $actualLabels = [];
        $predictedLabels = [];

        foreach ($user as $item) {
            $actualLabels[] = $item->kelas_asli;
            $predictedLabels[] = $item->kelas_prediksi;
        }

        $report = new ClassificationReport($actualLabels, $predictedLabels);

        $accuracy = Accuracy::score($actualLabels, $predictedLabels);

        return response()
            ->json([
                'precision' => $report->getPrecision(),
                'recall' => $report->getRecall(),
                'akurasi' => $accuracy
            ]);
    }

}