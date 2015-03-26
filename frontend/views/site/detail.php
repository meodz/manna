<?php 

use yii\helpers\Url;
$this->beginPage() ?>
<header class="header-pages">
    <form>
        <div class="container">
            <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12 logo-pages"><a href="<?= Url::to('') ?>"><img src="img/logo-pages.png" /></a></div>
            <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12 text-right">
                <div class="box-search">
                    <form>
                        <div class="input-group">
                            <input type="text" name="link" class="form-control" placeholder="Tìm hàng Amazon.com hoặc điền link Amazon để nhận báo giá " value="<?= isset($_GET['link']) ? $_GET['link'] : '' ?>" >
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type='submit' type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>        
                    </form> 
                </div>   
            </div>
        </div>
    </form>       
</header>
<section class="main-body">
    <div class="container">
        <div class="page-content">
            <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 left-block-product-detail">            
                <div class="col-lg-7 col-md-12 col-sm-7 col-xs-12 zoom-section">    	
                    <div class="thumb-product-detail zoom-desc"> 
                        <ul class="list-thumb-detail">    
                            <?php
                            $active = 'active';
                            foreach ($item->images as $img) {
                                ?>
                                <li class="<?= $active ?>">
                                    <a href='<?= $img ?>' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '<?= $img ?>' ">
                                        <img class="zoom-tiny-image" src="<?= $img ?>" alt = "" width="48"/>
                                    </a>
                                </li>
                                <?php
                                $active = '';
                            }
                            ?>
                        </ul>
                    </div>  
                    <div class="zoom-small-image big-image-product-detail">
                        <a href='<?= isset($item->images[0]) ? $item->images[0] : 'img/no-photo.jpg' ?>' class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">
                            <img src="<?= isset($item->images[0]) ? $item->images[0] : 'img/no-photo.jpg' ?>" alt='' title="" />
                        </a>
                    </div>
                </div>  
                <div class="col-lg-5 col-md-12 col-sm-5 col-xs-12 product-info-detail">
                    <a href="#"><?= $item->brand ?></a>
                    <h2 class="title-product-detail"><?= $item->name ? $item->name : 'Không rõ' ?></h2>
                    <hr />
                    <div class="form-horizontal" role="form">
                        <div class="form-group text-big">
                            <label class="col-sm-3 control-label">Giá <span class="text-right">:</span></label>
                            <div class="col-sm-9">
                                <p class="form-control-static price-now"><?= $item->price ? $item->price : 'Không rõ' . $item->currency ?></p>
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kích cỡ <span class="text-right">:</span></label>
                            <div class="col-sm-5">
                                <select name="1" class="form-control">
                                    <option>Tất cả</option>
                                    <option>Tất cả</option>
                                    <option>Tất cả</option>
                                    <option>Tất cả</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Màu sắc <span class="text-right">:</span></label>
                            <div class="col-sm-9">
                                <p class="form-control-static">Navy</p>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <ul class="list-color-pro-detail">
                                <?php
                                $active = 'active';
                                foreach ($item->images as $img) {
                                    ?>
                                    <li class="<?= $active ?>"><a href="#"><img src="<?= $img ?>"  width="48"/></a></li>
                                    <?php
                                    $active = '';
                                }
                                ?>
                            </ul>

                        </div> 
                        <div class="form-group product-detail-desc">
                            <p><strong>Thông tin sản phẩm</strong></p>
                            <?= $item->description ? $item->description : 'Không rõ' ?>
                        </div>                         
                    </div>
                </div>  
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 right-block-product-detail"> 
                <div class="block-number-buynow clearfix form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Số lượng:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control item-quantity" value="1"/>
                        </div>
                    </div>
                    <div class="clearfix">
                        <button onclick='order()' class="btn btn-danger btn-lg btn-block"><i class="fa fa-shopping-cart"></i> Đặt mua</button>
                    </div>
                </div>
                <div class="info-order">
                    <p><strong>Gọi điện đặt hàng</strong></p>
                    <p class="clearfix">Hà Nội: <span class="pull-right">04-3 858 9366</span></p>
                    <p class="clearfix">TP. Hồ Chí Minh:<span class="pull-right">04-3 858 9366</span></p>                       
                </div>
                <div class="info-order">
                    <p><strong>Dịch vụ của Hangnhap.vn</strong></p>
                    <ul class="list-service-nhaphang">
                        <li class="clearfix">
                            <span class="fa-border pull-left"><i class="fa fa-dollar"></i></span>
                            Giá bán là giá cuối ( đã bao gồm các khoản thuế, phí vận chuyển
                        </li>
                        <li class="clearfix">
                            <span class="fa-border pull-left"><i class="fa fa-history"></i></span>
                            Hoàn tiền, đổi trả với sản phẩm lỗi
                        </li>
                        <li class="clearfix">
                            <span class="fa-border pull-left"><span class="number-week">2</span><i class="fa fa-calendar"></i></span>
                            Dự kiến hàng về sau 2 tuần, giao hàng tận tay
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function order() {
        popup.open('order-form', '', framework.template('/checkoutinfo.html', {
            data: null,
        }), [
            {
                title: 'Create',
                fn: function () {
                    $('#orderForm').submit();
                }
            },
            {
                title: 'Cancel',
                fn: function () {
                    popup.close('user-form');
                }
            }
        ]);
        $('.itemName').html('<?= $item->name ?>').val('<?= $item->name ?>');
        $('.sourceLink').html('<?= $_GET['link'] ?>').val('<?= $_GET['link'] ?>');
        $('.itemPrice').html('<?= $item->price ?>').val('<?= $item->price ?>');
        $('.itemQuantity').html($('.item-quantity').val()).val($('.item-quantity').val());
    }
    function submitOrder() {
        framework.submit({
            id: 'orderForm',
            service: '/site/createorder',
            success: function (result) {
                popup.msg(result.message);
                popup.close('user-form');
                location.reload();
            }
        });
    }
</script>