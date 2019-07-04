<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 03/07/19
 * Time: 1:26
 */

namespace App\Api\V1\Controllers;


use App\Data;
use App\DataLatih;
use App\Http\Controllers\Controller;
use App\Pembobotan;

class PembobotanController extends Controller
{
    public function sumidf(){
        $data = Pembobotan::get();

        foreach ($data as $datum) {
            $sum = explode(' ', $datum->TF_IDF);

            $user = Data::where('akun',$datum->akun)->first();

            if(!$user){
                $user = DataLatih::where('akun',$datum->akun)->first();
            }

            $user->TF_IDF = $this->sumArray($sum);
            $user->save();
        }

        return response()
            ->json([
                'status' => 'ok'
            ]);
    }

    public function getdata(){
        $data = Data::get();

        return response()
            ->json(
                $data
            );
    }

    function sumArray($array) {
        $total = 0;
        foreach ($array as $value) {
            $total += $value;
        }
        return $total;
    }

}