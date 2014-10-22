<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jackieli
 * Date: 12-11-27
 * Time: 上午10:42
 */
interface IRecharge
{
    public function pay($params);
    public function returnURL($params);
    public function notifyURL($params);
}