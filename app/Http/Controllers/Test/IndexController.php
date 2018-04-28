<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * 根据路由 paht=comt  ...
     * 选择中间件
     * IndexController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if (strpos($request->getUri(), 'path=comt') !== false) {
            $this->middleware('comt');
        } elseif (strpos($request->getUri(), 'path=rank') !== false) {
            $this->middleware('rank');
        }
    }

    public function vueIndex()
    {
        dd(base64_encode('token=aserwserfsf&id=123&name=aaa&phone=18610309188'));
        $cmp = function ($str1, $str2) {

            return strcmp($str2->id,$str1->id);
                //return $str1->id > $str2->id ? -1 : 1;
        };
        $arr = [
            (object)['id'=>1,'name'=>'a'],
            (object)['id'=>2,'name'=>'b'],
            (object)['id'=>3,'name'=>'c'],
        ];
        usort($arr, $cmp);
        dd($arr);
    }
}