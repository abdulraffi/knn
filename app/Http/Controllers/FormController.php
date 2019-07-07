<?php

namespace App\Http\Controllers;

use App\DataLatih;
use App\Result;
use App\SettingTest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $data = DataLatih::get();
        $setting = SettingTest::orderBy('id', 'desc')->first();
        $result = Result::orderBy('id', 'desc')->first();

        return view('form/form', [
            'data' => $data,
            'setting' => $setting,
            'result' => $result
        ]);
    }
}
