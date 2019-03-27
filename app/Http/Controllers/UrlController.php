<?php

namespace App\Http\Controllers;

use App\Url;
use App\UrlVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{

    public function index(Request $request)
    {
        return view('index');
    }

    public function code(Request $request, $code)
    {
        $url = Url::findUrlByParams($code);

        if ($url) {
            UrlVisit::addVisit($request, $url);
            return redirect($url->url);
        }

        return redirect('/');
    }



    public function url(Request $request)
    {

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'url' => 'required|url',
            ]);

            $validator->after(function ($validator) {

                $code = $validator->getData()['code'];

                if ($code) {
                    preg_match('/[^0-9a-zA-Z]+/', $code, $out);
                    if (count($out) == 1) {
                        $validator->errors()->add('code', 'Not correct code');
                    } else {

                        $c = Url::query()->where(['code' => $code])->count();

                        if ($c > 0) {
                            $validator->errors()->add('code', 'Already exist.');
                        }

                    }

                }

            });

            if (!$validator->fails()) {
                $url = new Url();
                $url->url = trim($request->post('url'));
                $url->generateCode(trim($request->post('code')));
                $url->count = 0;
                $url->setExpired($request->post('date_expired', false));

                if ($url->save()) {
                    return redirect('/view/' . $url->code);
                } else {
                    return redirect('/');
                }

            } else {
                return redirect('/')
                    ->withErrors($validator)
                    ->withInput();
            }


        }

        return view('index');
    }


    public function urlData(Request $request, $code)
    {

        $url = Url::findUrlByParams($code);

        if ($url) {
            $shortUrl = $url->getShortUrl($request);
            $users = UrlVisit::query()->where(['url_id' => $url->id])->orderBy('id', 'desc')->paginate(10);
            $all_visits = UrlVisit::all();
            return view('url_data', ['shortUrl' => $shortUrl, 'url' => $url, 'users' => $users, 'all_visits' => $all_visits]);
        } else {
            return redirect('/');
        }

    }
}