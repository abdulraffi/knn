<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 03/07/19
 * Time: 1:52
 */

namespace App\Api\V1\Controllers;


use App\Data;
use App\Http\Controllers\Controller;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\Linear\LogisticRegression;


class KNNController extends Controller
{
    public function knn(){

        $classifier = new KNearestNeighbors(4);
        $logistic = new LogisticRegression();

        $user = Data::get();

        $datatest = [];
        $labeltest = [];

        foreach ($user as $item) {
            $data = [$item->follower,$item->following, $item->TF_IDF];
            $label = $item->label;
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

        $classifier->train($datatest, $labeltest);
        $logistic->train($datatest,$labeltest);
        $predict = $classifier->predict([2000, 300, 150300]);
        $predict_logis = $logistic->predict([500, 100, 70000]);

        return response()
            ->json([
                'knn' => $predict,
                'logis' => $predict_logis,
                'label' => $labeltest
            ]);

    }

}