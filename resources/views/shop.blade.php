@extends('layouts.site')

@section('content')
    <div class="container clearfix">

        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    <div class="col-lg-6 norightpadding" style="margin-bottom: 15px;">
                        <a href="#"><img src="images/shop/banners/2.jpg" alt="Image"></a>
                    </div>

                    <div class="col-lg-6 norightpadding" style="margin-bottom: 15px;">
                        <a href="#"><img src="images/shop/banners/8.jpg" alt="Image"></a>
                    </div>

                    <div class="w-100"></div>

                    <div class="col-lg-12 norightpadding">
                        <a href="#"><img src="images/shop/banners/4.jpg" alt="Image"></a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <a href="#"><img src="images/shop/banners/9.jpg" alt="Image"></a>
            </div>
        </div>

        <div class="clear"></div>

        <div class="tabs topmargin-lg clearfix" id="tab-3">

            <ul class="tab-nav clearfix">
                <li><a href="#tabs-9">New Arrivals</a></li>
                <li><a href="#tabs-10">Best sellers</a></li>
                <li><a href="#tabs-11">You may like</a></li>
            </ul>

            <div class="tab-container">

                <div class="tab-content clearfix" id="tabs-9">

                    <div id="shop" class="shop clearfix">

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/dress/1.jpg" alt="Checked Short Dress"></a>
                                <a href="#"><img src="images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a>
                                <div class="sale-flash">50% Off*</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Checked Short Dress</a></h3></div>
                                <div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
                                <a href="#"><img src="images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
                                <div class="product-price">$39.99</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <div class="fslider" data-arrows="false">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide"><a href="#"><img src="images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a></div>
                                            <div class="slide"><a href="#"><img src="images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a></div>
                                            <div class="slide"><a href="#"><img src="images/shop/shoes/1-2.jpg" alt="Dark Brown Boots"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
                                <div class="product-price">$49</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
                                <a href="#"><img src="images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
                                <div class="product-price">$19.95</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="tab-content clearfix" id="tabs-10">

                    <div id="shop" class="shop clearfix">

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/sunglasses/1.jpg" alt="Unisex Sunglasses"></a>
                                <a href="#"><img src="images/shop/sunglasses/1-1.jpg" alt="Unisex Sunglasses"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Unisex Sunglasses</a></h3></div>
                                <div class="product-price"><del>$19.99</del> <ins>$11.99</ins></div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/tshirts/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                <a href="#"><img src="images/shop/tshirts/1-1.jpg" alt="Blue Round-Neck Tshirt"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Blue Round-Neck Tshirt</a></h3></div>
                                <div class="product-price">$9.99</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/watches/1.jpg" alt="Silver Chrome Watch"></a>
                                <a href="#"><img src="images/shop/watches/1-1.jpg" alt="Silver Chrome Watch"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Silver Chrome Watch</a></h3></div>
                                <div class="product-price">$129.99</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/shoes/2.jpg" alt="Men Grey Casual Shoes"></a>
                                <a href="#"><img src="images/shop/shoes/2-1.jpg" alt="Men Grey Casual Shoes"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Men Grey Casual Shoes</a></h3></div>
                                <div class="product-price"><del>$45.99</del> <ins>$39.49</ins></div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-content clearfix" id="tabs-11">

                    <div id="shop" class="shop clearfix">

                        <div class="product clearfix">
                            <div class="product-image">
                                <div class="fslider" data-arrows="false">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide"><a href="#"><img src="images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
                                            <div class="slide"><a href="#"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
                                            <div class="slide"><a href="#"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Pink Printed Dress</a></h3></div>
                                <div class="product-price">$39.49</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/pants/5.jpg" alt="Green Trousers"></a>
                                <a href="#"><img src="images/shop/pants/5-1.jpg" alt="Green Trousers"></a>
                                <div class="sale-flash">Sale!</div>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Green Trousers</a></h3></div>
                                <div class="product-price"><del>$24.99</del> <ins>$21.99</ins></div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/sunglasses/2.jpg" alt="Men Aviator Sunglasses"></a>
                                <a href="#"><img src="images/shop/sunglasses/2-1.jpg" alt="Men Aviator Sunglasses"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Men Aviator Sunglasses</a></h3></div>
                                <div class="product-price">$13.49</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                            </div>
                        </div>

                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="images/shop/tshirts/4.jpg" alt="Black Polo Tshirt"></a>
                                <a href="#"><img src="images/shop/tshirts/4-1.jpg" alt="Black Polo Tshirt"></a>
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title"><h3><a href="#">Black Polo Tshirt</a></h3></div>
                                <div class="product-price">$11.49</div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="clear bottommargin-sm"></div>

        <div class="col_one_third">
            <div class="fancy-title title-border">
                <h4>About Us</h4>
            </div>
            <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
        </div>

        <div class="col_one_third subscribe-widget">
            <div class="fancy-title title-border">
                <h4>Subscribe for Offers</h4>
            </div>
            <p>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</p>
            <div class="widget-subscribe-form-result"></div>
            <form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                <div class="input-group divcenter">
                    <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon-email2"></i></div>
                        </div>
                    <input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col_one_third col_last">
            <div class="fancy-title title-border">
                <h4>Connect with Us</h4>
            </div>

            <a href="#" class="social-icon si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                <i class="icon-facebook"></i>
                <i class="icon-facebook"></i>
            </a>

            <a href="#" class="social-icon si-delicious" data-toggle="tooltip" data-placement="top" title="Delicious">
                <i class="icon-delicious"></i>
                <i class="icon-delicious"></i>
            </a>

            <a href="#" class="social-icon si-paypal" data-toggle="tooltip" data-placement="top" title="PayPal">
                <i class="icon-paypal"></i>
                <i class="icon-paypal"></i>
            </a>

            <a href="#" class="social-icon si-flattr" data-toggle="tooltip" data-placement="top" title="Flattr">
                <i class="icon-flattr"></i>
                <i class="icon-flattr"></i>
            </a>

            <a href="#" class="social-icon si-android" data-toggle="tooltip" data-placement="top" title="Android">
                <i class="icon-android"></i>
                <i class="icon-android"></i>
            </a>

            <a href="#" class="social-icon si-smashmag" data-toggle="tooltip" data-placement="top" title="Smashing Magazine">
                <i class="icon-smashmag"></i>
                <i class="icon-smashmag"></i>
            </a>

            <a href="#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="Google+">
                <i class="icon-gplus"></i>
                <i class="icon-gplus"></i>
            </a>

            <a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
                <i class="icon-wikipedia"></i>
                <i class="icon-wikipedia"></i>
            </a>

            <a href="#" class="social-icon si-stumbleupon" data-toggle="tooltip" data-placement="top" title="StumbleUpon">
                <i class="icon-stumbleupon"></i>
                <i class="icon-stumbleupon"></i>
            </a>

            <a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
                <i class="icon-foursquare"></i>
                <i class="icon-foursquare"></i>
            </a>

            <a href="#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="Call">
                <i class="icon-call"></i>
                <i class="icon-call"></i>
            </a>

            <a href="#" class="social-icon si-ninetyninedesigns" data-toggle="tooltip" data-placement="top" title="Ninety Nine Design">
                <i class="icon-ninetyninedesigns"></i>
                <i class="icon-ninetyninedesigns"></i>
            </a>

            <a href="#" class="social-icon si-forrst" data-toggle="tooltip" data-placement="top" title="Forrst">
                <i class="icon-forrst"></i>
                <i class="icon-forrst"></i>
            </a>

            <a href="#" class="social-icon si-digg" data-toggle="tooltip" data-placement="top" title="Digg">
                <i class="icon-digg"></i>
                <i class="icon-digg"></i>
            </a>
        </div>

        <div class="clear"></div>

        <div class="fancy-title title-border title-center topmargin-sm">
            <h4>Popular Brands</h4>
        </div>

        <ul class="clients-grid grid-6 nobottommargin clearfix">
            <li><a href="#"><img src="images/clients/logo/1.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/2.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/3.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/4.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/5.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/6.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/7.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/8.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/9.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/10.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/11.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/12.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/13.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/14.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/15.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/16.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/19.png" alt="Clients"></a></li>
            <li><a href="#"><img src="images/clients/logo/18.png" alt="Clients"></a></li>
        </ul>

    </div>

    <div class="section nobottommargin">
        <div class="container clearfix">

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-thumbs-up2"></i>
                    </div>
                    <h3>100% Original</h3>
                    <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-credit-cards"></i>
                    </div>
                    <h3>Payment Options</h3>
                    <p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin">
                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-truck2"></i>
                    </div>
                    <h3>Free Shipping</h3>
                    <p class="notopmargin">Free Delivery to 100+ Locations on orders above $40.</p>
                </div>
            </div>

            <div class="col_one_fourth nobottommargin col_last">
                <div class="feature-box fbox-plain fbox-dark fbox-small">
                    <div class="fbox-icon">
                        <i class="icon-undo"></i>
                    </div>
                    <h3>30-Days Returns</h3>
                    <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="section notopborder nobottomborder nomargin nopadding nobg footer-stick">
        <div class="container clearfix">

            <div class="col_half nobottommargin topmargin">
                <img src="images/services/4.jpg" alt="Image" class="nobottommargin">
            </div>

            <div class="col_half subscribe-widget nobottommargin col_last">

                <div class="heading-block topmargin-lg">
                    <h3><strong>GET 20% OFF*</strong></h3>
                    <span>Our App scales beautifully to different Devices.</span>
                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias.</p>

                <div class="widget-subscribe-form-result"></div>
                <form id="widget-subscribe-form3" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                    <div class="input-group" style="max-width:400px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon-email2"></i></div>
                        </div>
                        <input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">Subscribe Now</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection