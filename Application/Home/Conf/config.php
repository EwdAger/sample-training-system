<?php
return array(
    // 添加数据库配置信息
    'DB_TYPE'=>'mysql',// 数据库类型
    'DB_HOST'=>'127.0.0.1',// 服务器地址
    'DB_NAME'=>'tp3',// 数据库名
    'DB_USER'=>'root',// 用户名
    'DB_PWD'=>'',// 密码
    'DB_PORT'=>3306,// 端口
    'DB_PREFIX'=>'think_',// 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集

    'URL_MODEL'=>'2',// URL模式

    'SHOW_PAGE_TRACE'=>true, // 开启调试模式

    // 配置静态文件目录
    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => '/tp3/Public',
        '__CSS__' => '/tp3/Public/css',
    )
);