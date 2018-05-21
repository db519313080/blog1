<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use sngrl\SphinxSearch\SphinxSearch;

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
        //别忘记引入SphinxSearch()类
        $sphinx = new SphinxSearch();
        //search()第一个参数是查询的关键字，第二个参数是配置文件中添加的索引名（my_index_name）
        //$results = $sphinx->search('my Swift', 'test1')->query();//返回值为原生sphinx的结果
        $results = $sphinx->search('Omnis', 'test1')->get();//返回值为封装的后结果数组
        dd($results);
        //在某个字段中搜索关键字（返回原生的sphinx结果数组）,并添加分页限制
       // $sphinx->limit($limit,($page - 1) * $limit);
       // $result=$sphinx->search('@title "my query"','index_name')->query();
    }
}