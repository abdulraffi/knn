<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 07/07/19
 * Time: 21:54
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'result';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 're_a', 're_c', 're_e', 're_n', 're_o', 'pre_a', 'pre_c', 'pre_e', 'pre_n', 'pre_o',
        'akurasi', 'created_at', 'updated_at'
    ];

}