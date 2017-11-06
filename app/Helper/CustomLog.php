<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Log\Writer;

class CustomLog
{
    // 所有的LOG都要求在这里注册
    const LOG_ERROR = 'error';

    private static $loggers = array();

    // 获取一个实例
    public static function getLogger($name = 'normal_log',$type = self::LOG_ERROR, $day = 30)
    {

        if (empty(self::$loggers[$type])) {
            self::$loggers[$type] = new Writer(new Logger($type));
            $time=date('Ymd');
            self::$loggers[$type]->useDailyFiles(storage_path().'/logs/'.$name.$time.'/'. $type .'.log', $day);
        }

        $log = self::$loggers[$type];
        return $log;
    }
}