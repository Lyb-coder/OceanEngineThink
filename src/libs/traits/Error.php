<?php


namespace OceanEngineThink\libs\traits;

/**
 * 异常处理
 * trait Event
 * @package request
 * @author YaBin <mail@lvyabin.com>
 * @date 2021/4/1 15:32
 */
trait Error
{
    /**
     * 异常处理
     * @param string $message
     * @throws \Exception
     */
    public static function error($message = '未知错误'){
        throw new \Exception($message);
    }
}