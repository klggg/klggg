<?
/******************************
 * $File: module.php
 * $Description: 模块类处理文件
******************************/
if (!defined('ROOT_PATH'))  /*die('不能访问')*/echo "<script>window.location.href='/404.htm';</script>";//防止直接访问

require_once(ROOT_PATH."modules/borrow/borrow.count.php");
$result = borrowCountClass::BorrowRemindCount();

echo "[<a href='{$_A['admin_url']}&q=module/borrow/full&status=1&a=site' target='_blank'>满标待审核：{$result['borrow_full_check']}</a>] [<a href='{$_A['admin_url']}&q=module/borrow&status=0&a=site' target='_blank'>发标待审核：{$result['borrow_publish_wait']}</a>]<br>";
echo "[<a href='{$_A['admin_url']}&q=module/account/recharge&a=site' target='_blank'>充值未审核：{$result['recharge']}</a>][<a href='{$_A['admin_url']}&q=module/account/cash&a=site' target='_blank'>提现未审核：{$result['cash']}</a>]<br>";
echo "[<a href='{$_A['admin_url']}&q=module/attestation/realname&a=site' target='_blank'>实名未认证：{$result['real_status']}</a>][<a href='{$_A['admin_url']}&q=module/attestation/all&type=video&a=site' target='_blank'>视频未认证：{$result['video_status']}</a>]<br>";
echo "[<a href='{$_A['admin_url']}&q=module/attestation/vip&a=site' target='_blank'>VIP未认证：{$result['vip_status']}</a>][<a href='{$_A['admin_url']}&q=module/attestation/all&type=scene&a=site' target='_blank'>现场未认证：{$result['scene_status']}</a>]<br>";
echo "[<a href='{$_A['admin_url']}&q=module/liuyan&a=site' target='_blank'>留言未回复：{$result['liuyan_status']}</a>]";
echo "";
?>