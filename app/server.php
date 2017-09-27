<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26
 * Time: 10:51
 */


$dir = dirname(__DIR__);
require $dir . '/rua/rua.php';

// tcp服务器
$server = rua::server('tcp_server','127.0.0.1',4000);


/**
 * 开启
 */
$server->on('start',function ($server){
    console('server start');
});


/**
 * 客户端连接
 */
$server->on('connect',function ($server, $fd){
    console('client connect');
});


/**
 * 客户端接收消息
 */
$server->on('receive',function ($server, $fd, $data){
    console('receive data:' . $data);
});


/**
 * 客户端断开
 */
$server->on('close',function ($server, $fd){
    console('client close');
});

$server->start();