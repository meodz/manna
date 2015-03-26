<?php 

use yii\helpers\Url;
$this->beginPage() ?>

<header class="header-index">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-xs-12"><i class="fa fa-rss"></i> Về việc Thông báo chương trình phí ưu đãi giao dịch qua hangnhap.vn</div>
        <div class="col-lg-6 col-md-6 col-xs-12 text-right">Tìm chúng tôi trên: <i class="fa fa-google-plus-square"></i> &nbsp; &nbsp; <i class="fa fa-twitter-square"></i> &nbsp; &nbsp; <i class="fa fa-facebook-square"></i></div>
    </div>
</header>
<section class="main-body">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="text-center logo-lg-index"><a href="<?= Url::to('') ?>"><img src="img/logo-index.png" /></a></div>
            <div class="box-search">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" name="link" placeholder="Tìm hàng Amazon.com hoặc điền link Amazon để nhận báo giá " >
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="submit">Xem</button>
                        </span>
                    </div>
                    <p>Tìm hàng, ví dụ: <a href="#" target="_blank">Bebe</a>, <a href="#" target="_blank">Bebe dress</a>, <a href="#" target="_blank">Kindle Fire</a>, ( dùng từ khóa tiếng Anh để có kết quả tìm kiếm tốt hơn )</p>
                    <p class="hidden-md">Lấy báo giá, ví dụ: <a href="#" target="_blank" >http://ww.amazon/gp/product/B0051QVESA/ref=famstripe_k</a></p>                    
                </form>
            </div>
            <!--            <div role="tabpanel" class="tab-product-index">
                             Nav tabs 
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#id0" aria-controls="home" role="tab" data-toggle="tab">Thời trang & trang sức </a></li>
                                <li role="presentation"><a href="#id1" aria-controls="Sức khỏe - làm đẹp" role="tab" data-toggle="tab">Sức khỏe - làm đẹp</a></li>
                                <li role="presentation"><a href="#id2" aria-controls="Trẻ em" role="tab" data-toggle="tab">Trẻ em</a></li>
                                <li role="presentation"><a href="#id3" aria-controls="Đồ gia dụng" role="tab" data-toggle="tab">Đồ gia dụng</a></li>
                                <li role="presentation"><a href="#id4" aria-controls="Máy tính và đồ VP" role="tab" data-toggle="tab">Máy tính và đồ VP</a></li>
                                <li role="presentation"><a href="#id5" aria-controls="Kindle" role="tab" data-toggle="tab">Kindle</a></li>
                                <li role="presentation"><a href="#id6" aria-controls="Điện tử" role="tab" data-toggle="tab">Điện tử</a></li>
                                <li role="presentation"><a href="#id7" aria-controls="Thể thao" role="tab" data-toggle="tab">Thể thao</a></li>
                                <li role="presentation"><a href="#id8" aria-controls="Ôtô" role="tab" data-toggle="tab">Ôtô</a></li>                    
                            </ul>
                             Tab panes 
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="id0">
                                    <h2 class="title-sugget-key">Gợi ý từ khóa:</h2>
                                    <div class="block-list-key">
                                        <p><strong>Quần áo : </strong> <a href="#" title="#" target="_blank">iphone</a> | <a href="#" title="#" target="_blank">may tinh de ban</a> | <a href="#" title="#" target="_blank">dien thoai di dong</a> | <a href="#" title="#" target="_blank">điện thoại</a> | <a href="#" title="#" target="_blank">may tinh xach tay</a> | <a href="#" title="#" target="_blank">áo sơ mi nữ giá rẻ</a> | <a href="#" title="#" target="_blank">may nghe nhac mp3</a> | <a href="#" title="#" target="_blank">dien thoai trung quoc</a> | <a href="#" title="#" target="_blank">máy nghe nhạc mp3</a> | <a href="#" title="#" target="_blank">may choi game</a> | <a href="#" title="#" target="_blank">mua quan ao nam</a> | <a href="#" title="#" target="_blank">áo sơ mi hàn quốc</a> | <a href="#" title="#" target="_blank">màn hình lcd</a> | <a href="#" title="#" target="_blank">tai nghe khong day</a> | <a href="#" title="#" target="_blank">điện thoại trung quốc</a> | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                        <p><strong>Phụ kiện : </strong> <a href="#" title="#" target="_blank">iphone</a> | <a href="#" title="#" target="_blank">may tinh de ban</a> | <a href="#" title="#" target="_blank">dien thoai di dong</a> | <a href="#" title="#" target="_blank">điện thoại</a> | <a href="#" title="#" target="_blank">may tinh xach tay</a> | <a href="#" title="#" target="_blank">áo sơ mi nữ giá rẻ</a> | <a href="#" title="#" target="_blank">may nghe nhac mp3</a> | <a href="#" title="#" target="_blank">áo sơ mi hàn quốc</a> | <a href="#" title="#" target="_blank">màn hình lcd</a> | <a href="#" title="#" target="_blank">tai nghe khong day</a> | <a href="#" title="#" target="_blank">điện thoại trung quốc</a> | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                        <p><strong>Túi xách, hành lý: </strong> <a href="#" title="#" target="_blank">dien thoai trung quoc</a> | <a href="#" title="#" target="_blank">máy nghe nhạc mp3</a> | <a href="#" title="#" target="_blank">may choi game</a> | <a href="#" title="#" target="_blank">mua quan ao nam</a> | <a href="#" title="#" target="_blank">áo sơ mi hàn quốc</a> | <a href="#" title="#" target="_blank">màn hình lcd</a> | <a href="#" title="#" target="_blank">tai nghe khong day</a> | <a href="#" title="#" target="_blank">điện thoại trung quốc</a> | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                        <p><strong>Giày dép : </strong> <a href="#" title="#" target="_blank">iphone</a> | <a href="#" title="#" target="_blank">may tinh de ban</a> | <a href="#" title="#" target="_blank">dien thoai di dong</a> | <a href="#" title="#" target="_blank">điện thoại</a> | <a href="#" title="#" target="_blank">may tinh xach tay</a> | <a href="#" title="#" target="_blank">áo sơ mi nữ giá rẻ</a> | <a href="#" title="#" target="_blank">may nghe nhac mp3</a> | <a href="#" title="#" target="_blank">dien thoai trung quoc</a> | <a href="#" title="#" target="_blank">máy nghe nhạc mp3</a> | <a href="#" title="#" target="_blank">may choi game</a> | <a href="#" title="#" target="_blank">mua quan ao nam</a> | <a href="#" title="#" target="_blank">áo sơ mi hàn quốc</a> | <a href="#" title="#" target="_blank">màn hình lcd</a> | <a href="#" title="#" target="_blank">tai nghe khong day</a> | <a href="#" title="#" target="_blank">điện thoại trung quốc</a> | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                        <p><strong>Trang sức: </strong> <a href="#" title="#" target="_blank">iphone</a> | <a href="#" title="#" target="_blank">may tinh de ban</a> | <a href="#" title="#" target="_blank">dien thoai di dong</a> | <a href="#" title="#" target="_blank">điện thoại</a> | <a href="#" title="#" target="_blank">may tinh xach tay</a> | <a href="#" title="#" target="_blank">áo sơ mi nữ giá rẻ</a> | <a href="#" title="#" target="_blank">may nghe nhac mp3</a> | <a href="#" title="#" target="_blank">dien thoai trung quoc</a> | <a href="#" title="#" target="_blank">máy nghe nhạc mp3</a> | <a href="#" title="#" target="_blank">may choi game</a> | <a href="#" title="#" target="_blank">mua quan ao nam</a> | <a href="#" title="#" target="_blank">áo sơ mi hàn quốc</a> | <a href="#" title="#" target="_blank">màn hình lcd</a> | <a href="#" title="#" target="_blank">tai nghe khong day</a> | <a href="#" title="#" target="_blank">điện thoại trung quốc</a> | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                        <p><strong>Đồng hồ: </strong> <a href="#" title="#" target="_blank">iphone</a> | <a href="#" title="#" target="_blank">may tinh de ban</a> | <a href="#" title="#" target="_blank">dien thoai di dong</a> | <a href="#" title="#" target="_blank">điện thoại</a>  | <a href="#" title="#" target="_blank">may nghe nhac</a> </p>
                                    </div>
                                    <h2 class="title-sugget-key">Gợi ý thương hiệu:</h2>
                                    <div class="block-list-key">
                                        <ul class="list-brand-logo">
                                            <li><a href="#"><img src="img/data/logo1.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo2.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo3.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo4.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo5.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo6.png" /></a></li>
            
                                            <li><a href="#"><img src="img/data/logo1.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo2.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo3.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo4.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo5.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo6.png" /></a></li>
            
                                            <li><a href="#"><img src="img/data/logo1.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo2.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo3.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo4.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo5.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo6.png" /></a></li>
            
                                            <li><a href="#"><img src="img/data/logo1.png" /></a></li>
                                            <li><a href="#"><img src="img/data/logo2.png" /></a></li>
            
                                        </ul>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="id1">Tab1...</div>
                                <div role="tabpanel" class="tab-pane" id="id2">Tab2...</div>
                                <div role="tabpanel" class="tab-pane" id="id3">Tab3...</div>
                                <div role="tabpanel" class="tab-pane" id="id4">Tab4...</div>
                                <div role="tabpanel" class="tab-pane" id="id5">Tab5...</div>
                                <div role="tabpanel" class="tab-pane" id="id6">Tab6...</div>
                                <div role="tabpanel" class="tab-pane" id="id7">Tab7...</div>
                                <div role="tabpanel" class="tab-pane" id="id8">Tab8...</div>
                            </div>
            
                        </div>                -->

        </div>
    </div>
</section>