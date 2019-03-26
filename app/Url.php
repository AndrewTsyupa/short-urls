<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Url extends Model
{
    protected $table = 'urls';

    protected $fillable = [
        'url',
        'code',
        'count',
    ];


    public function generateCode($code)
    {
        if ($code) {
            $this->code = $code;
        } else {
            $this->code = substr(sha1(time() . $this->url), 0, 5);
        }

    }

    public function getShortUrl(Request $request)
    {
        return $request->getScheme() . '://' . $request->server('SERVER_NAME') . '/' . $this->code;;
    }

    public function setExpired($date)
    {
        $this->expired = 0;

        if ($date) {
            $d = \DateTime::createFromFormat('d-m-Y', $date);

            if ($d) {
                $this->expired = $d->getTimestamp();
            }
        }
    }

    public static function findUrlByParams($code)
    {

        $url = self::query()->where(['code' => $code])->first();

        if ($url) {

            $isLive = $url->expired == 0 || $url->expired > time();

            if ($isLive) {
                return $url;
            }

        }


        return null;
    }

}