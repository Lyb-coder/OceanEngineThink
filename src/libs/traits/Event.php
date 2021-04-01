<?php

namespace OceanEngineThink\libs\traits;
/**
 * 巨量引擎回调事件
 * trait Event
 * @package request
 * @author YaBin <mail@lvyabin.com>
 * @date 2021/4/1 15:32
 */
trait Event
{

    use Request;
    
    private $callbackUrl = 'https://ad.oceanengine.com/track/activate/';

    protected $params = [];

    /**
     * 设置回调参数
     * @param $input
     * @return $this
     */
    public function setCallbackParam(array $input)
    {
        if (!isset($input['callback_param']))
            Error::error('缺少回调参数：callback_param');

        $this->params['callback']  = $input['callback_param'];
        $this->params['os']        = $this->os;
        $this->params['conv_time'] = time();
        return $this;
    }

    /**
     * 回调请求发送
     * @return array
     */
    private function send()
    {
        $info = self::get($this->callbackUrl, $this->params);
        return [
            'param' => $this->params, 'result' => $info
        ];
    }
    /**
     * 激活事件
     * @return array
     */
    public function activation()
    {
        $this->params['event_type'] = 0;
        return $this->send();
    }

    /**
     * 注册事件
     * @return array
     */
    public function register()
    {
        $this->params['event_type'] = 1;
        return $this->send();
    }

    /**
     * 付费事件
     * @return array
     */
    public function payment()
    {
        $this->params['event_type'] = 2;
        return $this->send();
    }

    /**
     * 表单事件
     * @return array
     */
    public function form()
    {
        $this->params['event_type'] = 3;
        return $this->send();
    }

    /**
     * 在线资讯
     * @return array
     */
    public function onlineInformation()
    {
        $this->params['event_type'] = 4;
        return $this->send();
    }

    /**
     * 有效资讯
     * @return array
     */
    public function validInformation()
    {
        $this->params['event_type'] = 5;
        return $this->send();
    }

    /**
     * 次留
     * @return array
     */
    public function secondStay()
    {
        $this->params['event_type'] = 6;
        return $this->send();
    }

    /**
     * app内下单
     * @return array
     */
    public function orderInApp()
    {
        $this->params['event_type'] = 20;
        return $this->send();
    }

    /**
     * app内访问
     * @return array
     */
    public function accessInApp()
    {
        $this->params['event_type'] = 21;
        return $this->send();
    }

    /**
     * app内添加购物车
     * @return array
     */
    public function addShoppingCartToApp()
    {
        $this->params['event_type'] = 22;
        return $this->send();
    }

    /**
     * app内付费
     * @return array
     */
    public function payInApp()
    {
        $this->params['event_type'] = 23;
        return $this->send();
    }

    /**
     * 关键行为
     * @return array
     */
    public function keyBehaviors()
    {
        $this->params['event_type'] = 25;
        return $this->send();
    }

    /**
     * 授权
     * @return array
     */
    public function toGrantAuthorization()
    {
        $this->params['event_type'] = 28;
        return $this->send();
    }

    /**
     * app内详情页到站uv
     * @return array
     */
    public function detailsPageInApp()
    {
        $this->params['event_type'] = 29;
        return $this->send();
    }

    /**
     * 点击商品
     * @return array
     */
    public function clickProduct()
    {
        $this->params['event_type'] = 179;
        return $this->send();
    }

    /**
     * 加入收藏/心愿单
     * @return array
     */
    public function wishList()
    {
        $this->params['event_type'] = 128;
        return $this->send();
    }

    /**
     * 领取优惠券
     * @return array
     */
    public function getCoupons()
    {
        $this->params['event_type'] = 213;
        return $this->send();
    }

    /**
     * 立即购买
     * @return array
     */
    public function buyNow()
    {
        $this->params['event_type'] = 175;
        return $this->send();
    }

    /**
     * 添加/选定收货信息、电话
     * @return array
     */
    public function selectReceivingInformation()
    {
        $this->params['event_type'] = 212;
        return $this->send();
    }

    /**
     * 添加/选定支付信息，绑定支付宝、微信、银行卡等
     * @return array
     */
    public function selectPaymentInformation()
    {
        $this->params['event_type'] = 127;
        return $this->send();
    }

    /**
     * 提交订单
     * @return array
     */
    public function placeOrder()
    {
        $this->params['event_type'] = 176;
        return $this->send();
    }

    /**
     * 订单提交/确认收货
     * @return array
     */
    public function confirmReceipt()
    {
        $this->params['event_type'] = 214;
        return $this->send();
    }

    /**
     * 进入直播间
     * @return array
     */
    public function enterTheLiveRoom()
    {
        $this->params['event_type'] = 202;
        return $this->send();
    }

    /**
     * 直播间内点击关注按钮
     * @return array
     */
    public function liveClickToFollow()
    {
        $this->params['event_type'] = 204;
        return $this->send();
    }

    /**
     * 直播间内评论
     * @return array
     */
    public function liveRoomComments()
    {
        $this->params['event_type'] = 205;
        return $this->send();
    }

    /**
     * 直播间内打赏
     * @return array
     */
    public function liveBroadcastReward()
    {
        $this->params['event_type'] = 206;
        return $this->send();
    }

    /**
     * 直播间内点击购物车按钮
     * @return array
     */
    public function liveClickShoppingCart()
    {
        $this->params['event_type'] = 207;
        return $this->send();
    }

    /**
     * 直播间内商品点击
     * @return array
     */
    public function liveProductClick()
    {
        $this->params['event_type'] = 208;
        return $this->send();
    }

    /**
     * 直播间进入种草页跳转到第三方
     * @return array
     */
    public function liveJumpToThirdParty()
    {
        $this->params['event_type'] = 209;
        return $this->send();
    }

    /**
     * 直播-加购
     * @return array
     */
    public function liveBroadcastPlusPurchase()
    {
        $this->params['event_type'] = 210;
        return $this->send();
    }

    /**
     * 直播-下单
     * @return array
     */
    public function liveOrder()
    {
        $this->params['event_type'] = 211;
        return $this->send();
    }

}