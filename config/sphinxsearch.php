<?php
return array (
//本地sphinx服务器地址
    'host'    => '127.0.0.1',
    //本地sphinx服务器端口号
    'port'    => 9312,
    'indexes' => array (
        //这里的my_index_name是刚才配置sphinx.conf中的索引名称，例如我上面的配置文件我的索引名称就应该为main,后面的数组中table表示索引关联的表，第二个key为搜索结果中关联id对应的表id名，
        'test1' => array ( 'table' => 'statuses', 'column' => 'id' ),
        //当然也可以不使用数组关联表
        //'my_index_name' => FALSE,
    )
);
