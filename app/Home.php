<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public const RANDOM_STRING = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public $count = 6;

    protected $table = 'links';

    protected $fillable = [
        'url', 'short_key',
    ];


    public function getGeneratedKey()
    {
        $stringLength = strlen(self::RANDOM_STRING);
        $code = '';

        for ($i = 0; $i < $this->count; $i++) {
            $code .= self::RANDOM_STRING[rand(0, $stringLength - 1)];
        }

        if($this->checkGeneratedKey($code)){
            $this->getGeneratedKey;
        }

        return $code;
    }

    private function checkGeneratedKey($code){

        $code = $this->where('short_key', $code)->first();

        return isset($code);
    }

}
