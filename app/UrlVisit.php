<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Psy\Util\Json;

class UrlVisit extends Model
{
    protected $table = 'url_visits';

    public $timestamps = false;

    protected $fillable = [
        'url_id',
        'user_ip',
        'user_agent',
        'user_data',
    ];

    public function url()
    {
        return $this->belongsTo('App\Url', 'url_id');
    }

    public static function addVisit(Request $request, $urlObj)
    {
        $row = new UrlVisit();
        $row->url_id = $urlObj->id;
        $row->user_ip = ip2long($request->getClientIp());
        $row->user_agent = $request->userAgent();
        $row->getUserDataByIp($request);

        if ($row->save()) {
            $row->url->count += 1;
            $row->url->save();
        }

    }

    public function getIp(){
        return long2ip($this->user_ip);
    }

    private function getUserDataByIp(Request $request)
    {
        $clientIp = $request->getClientIp();

        $ipInfoUrl = sprintf('http://ipinfo.io/%s/json', $clientIp);
        $data = trim(@file_get_contents($ipInfoUrl));
        $this->user_data = $data;
    }

    public function userDataRow()
    {
        $data = @json_decode($this->user_data, true);

        if ($data) {

            $arr = [
                $data['city'],
                $data['region'],
                $data['country'],
                $data['loc'],
            ];

            return implode(', ', $arr);
        }

        return '';
    }


}
