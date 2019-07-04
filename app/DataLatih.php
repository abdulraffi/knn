<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 04/07/19
 * Time: 21:31
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
    protected $table = 'data_uji_latihan';
    protected $primaryKey = 'id';

    protected $fillable = ['TF_IDF' , 'kelas_prediksi'];

}