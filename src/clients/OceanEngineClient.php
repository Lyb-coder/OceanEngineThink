<?php
/**
 * @author: lvyabin<mail@lvyabin.com>
 * @day: 2021/4/1
 */

namespace OceanEngineThink\clients;

use OceanEngineThink\libs\device\Android;
use OceanEngineThink\libs\device\Ios;
use OceanEngineThink\libs\traits\Error;

/**
 * Class OceanEngineClient
 * @package clients
 */
class OceanEngineClient
{
    /**
     * 配置信息
     * @var array|string[]
     */
    protected $config = [
        'show_api'  => 'http://juliang.com/api/show', //展示接口
        'click_api' => 'http://juliang.com/api/click' //点击接口
    ];

    /**
     * 设备
     * @var Android|Ios
     */
    protected $device;

    /**
     * OceanEngineClient constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (!empty($config))
            $this->config = array_merge($this->config, $config);
    }

    /**
     * @return Android|Ios
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setDevice($device)
    {
        switch ($device) {
            case 'Android':
                $this->device = new Android();
                break;
            case 'iOS':
                $this->device = new Ios();
                break;
            default:
                Error::error('The device must be Android or iOS');
        }
        return $this;
    }

    /**
     * 获取点击链接
     * @param array $CustomPars 自定义参数
     * @return string
     * @throws \Exception
     */
    public function getClickLink($CustomPars = [])
    {
        if (!$this->device) {
            Error::error('Device cannot be empty');
        }
        $pars      = array_merge($this->device->devicePars, $CustomPars);
        $click_api = $this->config['click_api'];
        $click_api .= stripos($this->config['click_api'], '?') !== false ? '&' : '?' . http_build_query($pars);;
        return $click_api;
    }

    /**
     * 获取展示链接
     * @param array $CustomPars 自定义参数
     * @return string
     * @throws \Exception
     */
    public function getShowLink($CustomPars = [])
    {
        if (!$this->device) {
            Error::error('Device cannot be empty');
        }
        $pars     = array_merge($this->device->devicePars, $CustomPars);
        $show_api = $this->config['show_api'];
        $show_api .= stripos($this->config['show_api'], '?') !== false ? '&' : '?' . http_build_query($pars);;
        return $show_api;
    }

}