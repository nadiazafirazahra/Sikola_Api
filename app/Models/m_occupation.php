<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class m_occupation extends Model {

	protected $fillable =  [
        'id',
        'code',
        'name',
        'created_at',
        'updated_at'
    ];

	public static function array_to_db($array_data){
        $total=sizeof($array_data);
        if($total>0){
            try {
                foreach ($array_data as $value) {
                    $key=explode(';',$value);
                    self::create([
                        'code'     			=>$key[0],
                        'name'    	 		=>$key[1],
                    ]);
                }
                return 1;
            } catch (Exception $e) {
                return 0;
            }
        }else{
            return 0;
        }
    }
}
