<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    const CODE_USED = 1, CODE_NOT_USED = 0;

    const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    const length = 35;

    protected $table = 'codes';

    public function generateCode()
    {
        $codes = Code::all();

        do {
            $new_code = '';
            $status_code = false;

            for ($i = 0; $i < 8; $i++) {
                $random_pos = random_int(0, self::length);
                $char = substr(self::chars, $random_pos, 1);
                $new_code .= $char;
            }

            foreach ($codes as &$code) {
                if ($code == $new_code) {
                    $status_code = true;
                }
            }

        }while ($status_code == true);

        return $new_code;
    }

    public function isUsed()
    {
        return $this->status==Code::CODE_USED;
    }
}
