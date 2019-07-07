<?php
/**
 * Created by PhpStorm.
 * User: ruppey
 * Date: 07/07/19
 * Time: 20:20
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class SettingTest extends Model
{
    protected $table = 'setting_test';
    protected $primaryKey = 'id';

    protected $fillable = ['nilai_k','follower', 'following', 'total_media_url', 'total_url',
        'total_mention', 'total_RT', 'total_hashtag', 'total_huruf_besar', 'total_tanda_baca', 'total_emoji', 
        'total_kata', 'rata2_kata', 'total_karakter', 'rata2_karakter', 'TF_IDF','created_at','updated_at'
    ];

}