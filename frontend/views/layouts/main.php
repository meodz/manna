<?php

use yii\helpers\Html;
use frontend\assets\CommonAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

$commonBundle = CommonAsset::register($this);
$userBundle = frontend\assets\UserAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script>
            framework({
                baseUrl: '<?= Url::to('/hangnhap') ?>',
                assetsUrl: '<?= Url::to('/hangnhap/frontend/web') ?>',
                uploadUrl: '<?= Url::to('/frontend') . '/upload' ?>',
                templatePath: '/template',
                servicePath: '/frontend/web'
            });
        </script> 
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <div class="container">
                <?= $content ?>
                <footer>
                    <div class="footer-payment">
                        <div class="container">            
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="pull-left title-support-payment" >Hỗ trợ thanh toán</div>
                                <ul class="ul-bank">
                                    <li><a title="Thẻ thanh toán VisaCard" target="_blank" href="http://www.vietnam-visa.com" class="visacrd"></a></li>
                                    <li><a title="Thẻ thanh toán MasterCard" target="_blank" href="http://www.mastercard.com" class="mastercrd"></a></li>
                                    <li><a title="Hệ thống thanh toán trực tuyến Paypal" target="_blank" href="https://www.paypal.com" class="paypal"></a></li>
                                    <li><a title="Công ty cổ phần Ngân Lượng" target="_blank" href="http://www.nganluong.vn" class="nganluong"></a></li>
                                    <li><a title="Ngân hàng TMCP Ngoại Thương Việt Nam" target="_blank" href="http://www.vietcombank.com.vn" class="vietcombank"></a></li>
                                    <li><a title="Ngân hàng TMCP Kỹ Thương Việt Nam" target="_blank" href="http://www.techcombank.com.vn" class="techbk"></a></li>
                                    <li><a title="Ngân hàng Đông Á" target="_blank" href="http://www.dongabank.com.vn" class="dongabk"></a></li>
                                    <li><a title="Ngân hàng Công Thương Việt Nam" target="_blank" href="http://www.vietinbank.vn" class="vietinbk"></a></li>
                                    <li><a title="Ngân hàng Quốc Tế" target="_blank" href="http://www.vib.com.vn" class="vibk"></a></li>
                                    <li><a title="Ngân hàng TMCP Sài Gòn" target="_blank" href="http://www.shb.com.vn" class="shbk"></a></li>
                                    <li><a title="Ngân hàng Á Châu" target="_blank" href="http://www.acb.com.vn" class="acbbk"></a></li>
                                    <li><a title="Ngân hàng TMCP Sài Gòn Thương Tín" target="_blank" href="http://www.sacombank.com.vn" class="sacombk"></a></li>
                                    <li><a title="Ngân hàng Đầu Tư và Phát Triển Việt Nam" target="_blank" href="http://www.bidv.com.vn" class="bidvbk"></a></li>
                                    <li><a title="Ngân hàng Nông Nghiệp và Phát Triển Nông Thôn Việt Nam" target="_blank" href="http://www.agribank.com.vn" class="agrbk"></a></li>
                                    <li><a title="Ngân hàng Quân Đội" target="_blank" href="http://www.militarybank.com.vn" class="mbk"></a></li>
                                    <li><a title="Ngân hàng Xuất Nhập Khẩu Việt Nam" target="_blank" href="http://www.eximbank.com.vn" class="exembank"></a></li>
                                    <li><a title="Ngân hàng Việt Nam Thịnh Vượng" target="_blank" href="http://www.vpb.com.vn" class="vpbk"></a></li>
                                    <li><a title="Ngân hàng TMCP Đông Nam Á" target="_blank" href="http://seabank.com.vn" class="seabk"></a></li>
                                    <li><a title="Ngân hàng Bắc Á" target="_blank" href="http://www.baca-bank.vn" class="bacabk"></a></li>
                                    <li><a title="Ngân hàng TMCP Hàng Hải Việt Nam" target="_blank" href="http://www.msb.com.vn" class="maritbk"></a></li>
                                    <li><a title="Ngân hàng TMCP Xăng Dầu Petrolimex Việt Nam" target="_blank" href="http://www.pgbank.com.vn" class="pgbk"></a></li>
                                    <li><a title="Ngân hàng TMCP Đại Dương" target="_blank" href="http://www.oceanbank.vn/Index.html" class="oceanbank"></a></li>
                                    <li><a title="Ngân hàng TMCP Phát Triển TP.HCM" target="_blank" href="http://www.hdbank.vn" class="hdbank"></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copy-right">
                        <div class="container">
                            <div class="col-lg-7 col-md-7 col-xs-12">
                                <div class="logo-footer pull-left"><a href="#"><img src="img/logo-small.png" /></a></div>
                                <div class="footer-info">
                                    <p>Một sản phẩm của PeaceSoft Solutions Corporation.</p>
                                    <p>Giấy phép số 70/GP-BC (Bộ VHTT) và 333/GP-BBCVT (Bộ BCVT) </p>
                                    <p>Chịu trách nhiệm: <strong>Bà Đào Lan Hương</strong>.</p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="footer-info">
                                    <p><strong>Hà Nội:</strong> Tầng 12A, tòa nhà 18 Tam Trinh, Hai Bà Trưng</p>
                                    <p><strong>Tel:</strong> 1900-585-888 (Nhánh 107 & 117), Fax: 04-3632-0987</p>
                                    <p><strong>TP.HCM:</strong> Lầu 3, tòa nhà VTC online, 132 Cộng Hòa, P4, Q. Tân Bình</p>
                                    <p><strong>Tel:</strong> 1900-585-888 (Nhánh 117), Fax: 08- 3811-4757</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-link">
                        <div class="container">
                            <div class="col-xs-12 text-center">
                                Hàng eBay - <a href="http://ebay.vn" target="_blank">eBay.vn</a>   |  Hàng Amazon - <a href="http://hangnhap.vn" target="_blank">Hangnhap.vn</a>   |   <br />
                                Hàng hiệu - <a href="http://naima.vn" target="_blank">naima.vn</a>   |   Chợ trong nước = <a href="http://chodientu.vn" target="_blank">ChợĐiệnTử.vn</a>  |  So sánh giá  -  <a href="http://chongiadung.vn" target="_blank">Chongiadung.vn</a>   |  Rao vặt - <a href="http://saobang.vn" target="_blank">Saobang.vn</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
