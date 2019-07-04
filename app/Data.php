<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 03/07/19
 * Time: 1:35
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data_uji_banyak';
    protected $primaryKey = 'id';

    protected $fillable = ['TF_IDF'];


}