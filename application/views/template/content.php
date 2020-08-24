    <!--====== SLIDER PART START ======-->
        
    <section id="home" class="slider-area pt-100">
            <div class="container-fluid position-relative">
                <div class="slider-active">
                    <?php foreach($slider as $slider) :?>
                    <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center ">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="uploads/slider/<?= $slider->gambar_slider?>" alt="Slider">
                                        <?php if($slider->text_discount_1 || $slider->text_discount_2){?>
                                        <div class="slider-discount-tag">
                                            <p><?= $slider->text_discount_1?> <br> <?= $slider->text_discount_2?></p>
                                        </div>
                                        <?php }?>
                                    
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><?= $slider->judul?></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s"><?= $slider->description ? $slider->description : "" ?></p>
                                        <a class="main-btn" href="https://www.instagram.com/miqumimutuban/" target="_blank" data-animation="fadeInUp" data-delay="1.5s">Explore More <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                    </div> <!-- single slider -->
                    <?php endforeach;?>
                </div> <!-- slider active -->
                <div class="slider-social">
                    <div class="row justify-content-end">
                        <div class="col-lg-7 col-md-6">
                            <ul class="social text-right">
                                <li><a href="https://www.facebook.com/miqumimutuban" target="_blank"><i class="lni-facebook-filled"></i></a></li>
                                
                                <li><a href="https://www.instagram.com/miqumimutuban/" target="_blank"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- container fluid -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== DISCOUNT PRODUCT PART START ======-->
    
    
    
    <!--====== DISCOUNT PRODUCT PART ENDS ======-->
   
    <!--====== PRODUCT PART START ======-->
    
    <section id="product" class="product-area pt-100 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="collection-menu text-center mt-30">
                        <h4 class="collection-tilte">PRODUK KAMI</h4>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="active" id="v-pills-makanan-tab" data-toggle="pill" href="#v-pills-makanan" role="tab" aria-controls="v-pills-makanan" aria-selected="true">Makanan</a>
                            
                            <a id="v-pills-minuman-tab" data-toggle="pill" href="#v-pills-minuman" role="tab" aria-controls="v-pills-minuman" aria-selected="false">Minuman</a>
                            
                            <a id="v-pills-lainya-tab" data-toggle="pill" href="#v-pills-lainya" role="tab" aria-controls="v-pills-lainya" aria-selected="false">Lainya</a>
                            
                            
                        </div> <!-- nav -->
                    </div> <!-- collection menu -->
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-makanan" role="tabpanel" aria-labelledby="v-pills-makanan-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">

                                    <?php foreach($makanan as $makanan):?>
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $makanan->pesan_order_wa?>" target="_blank"><img src="uploads/produk/makanan/<?= $makanan->gambar?>" alt="Product"></a>
                                                <?php if($makanan->text_discount){?>
                                                <div class="product-discount-tag">
                                                    <p><?= substr($makanan->text_discount,0,2)?>%</p>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $makanan->pesan_order_wa?>" target="_blank"><?= $makanan->judul_produk?></a></h5>
                                                
                                                <ul class="rating">
                                                    <?php for($i = 1; $i < $makanan->rating; $i++):?>
                                                        <li><i class="lni-star-filled"></i></li>
                            
                                                    <?php endfor;?>
                                                </ul>
                                                <?php if($makanan->harga_potong == "0"){?>
                                                <span class="regular-price">Rp. <?= number_format($makanan->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                                <?php if($makanan->harga_potong){?>
                                                    <span class="regular-price">Rp. <?= number_format($makanan->harga_asli - $makanan->harga_potong, 0,',','.')?></span>
                                                    <span class="discount-price">Rp. <?= number_format($makanan->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                            </div>
                                        </div> <!-- single product items -->
                                    </div>
                                    <?php endforeach;?>
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
                        <div class="tab-pane fade show " id="v-pills-minuman" role="tabpanel" aria-labelledby="v-pills-minuman-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">

                                    <?php foreach($minuman as $minuman):?>
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $minuman->pesan_order_wa?>" target="_blank"><img src="uploads/produk/minuman/<?= $minuman->gambar?>" alt="Product"></a>
                                                <?php if($minuman->text_discount){?>
                                                <div class="product-discount-tag">
                                                    <p><?= substr($minuman->text_discount,0,2)?>%</p>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $minuman->pesan_order_wa?>" target="_blank"><?= $minuman->judul_produk?></a></h5>
                                                <ul class="rating">
                                                    <?php for($i = 1; $i < $minuman->rating; $i++):?>
                                                        <li><i class="lni-star-filled"></i></li>
                            
                                                    <?php endfor;?>
                                                </ul>
                                                <?php if($minuman->harga_potong == "0"){?>
                                                <span class="regular-price">Rp. <?= number_format($minuman->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                                <?php if($minuman->harga_potong){?>
                                                    <span class="regular-price">Rp. <?= number_format($minuman->harga_asli - $minuman->harga_potong, 0,',','.')?></span>
                                                    <span class="discount-price">Rp. <?= number_format($minuman->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                            </div>
                                        </div> <!-- single product items -->
                                    </div>
                                    <?php endforeach;?>
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
                        <div class="tab-pane fade show " id="v-pills-lainya" role="tabpanel" aria-labelledby="v-pills-lainya-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">

                                    <?php foreach($lainya as $lainya):?>
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $lainya->pesan_order_wa?>" target="_blank"><img src="uploads/produk/lainya/<?= $lainya->gambar?>" alt="Product"></a>
                                                <?php if($lainya->text_discount){?>
                                                <div class="product-discount-tag">
                                                    <p><?= substr($lainya->text_discount,0,2)?>%</p>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="https://api.whatsapp.com/send?phone=6285235898303&text=<?= $lainya->pesan_order_wa?>" target="_blank"><?= $lainya->judul_produk?></a></h5>
                                                
                                                <ul class="rating">
                                                    <?php for($i = 1; $i < $lainya->rating; $i++):?>
                                                        <li><i class="lni-star-filled"></i></li>
                            
                                                    <?php endfor;?>
                                                </ul>
                                                <?php if($lainya->harga_potong == "0"){?>
                                                <span class="regular-price">Rp. <?= number_format($lainya->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                                <?php if($lainya->harga_potong){?>
                                                    <span class="regular-price">Rp. <?= number_format($lainya->harga_asli - $lainya->harga_potong, 0,',','.')?></span>
                                                    <span class="discount-price">Rp. <?= number_format($lainya->harga_asli, 0,',','.')?></span>
                                                <?php }?>
                                            </div>
                                        </div> <!-- single product items -->
                                    </div>
                                    <?php endforeach;?>
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
                        
                        
                    </div> <!-- tab content --> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PRODUCT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    
    <section id="service" class="services-area pt-125 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-30">
                        <h5 class="mb-15"></h5>
                        <h3 class="title mb-15">Service Kami</h3>
                        <p>Berikut Ini Service Kami Dalam Melayani Pelanggan.</p>
                    </div> <!-- section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-left mt-45">
                        <div class="services">
                            <img src="assets/images/services/service-img.jpg" alt="Service">
                            <a href="https://www.instagram.com/miqumimutuban/" target="_blank" class="main-btn mt-30">Read More <i class="lni-chevron-right"></i></a>
                        </div> <!-- services btn -->
                    </div> <!-- services left -->
                </div>
                <div class="col-lg-6">
                    
                    <div class="services-right mt-45">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-8">
                                <div class="single-services text-center">
                                    <div class="services-icon">
                                        <i class="lni-grid-alt"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Modern</h5>
                                        <p>Kami Selalu Menjaga Kemasan Produk Agar Selalu Higenis, Ekonomis, dan Stylish.</p>
                                    </div>
                                </div> <!-- single services -->
                                
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-ruler-pencil"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Creative</h5>
                                        <p>Kami Selalu Menerima Saran dan Masukan Dari Pelanggan Agar Terbaik Untuk Kedepanya.</p>
                                    </div>
                                </div> <!-- single services -->
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-customer"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Low Budget</h5>
                                        <p>Kami Pastikan Produk Terjangkau Dibanding Dengan Lainya.</p>
                                    </div>
                                </div> <!-- single services -->
                                
                                <div class="single-services text-center mt-30">
                                    <div class="services-icon">
                                        <i class="lni-support"></i>
                                    </div>
                                    <div class="services-content mt-20">
                                        <h5 class="title mb-10">Fast Renponse</h5>
                                        <p>Kami Selalu Memberikan Informasi Yang Terbaik Kepada Pelanggan.</p>
                                    </div>
                                </div> <!-- single services -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- services right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART ENDS ======-->

    <!--====== SHOWCASE PART START ======-->
    
    <section id="showcase" class="showcase-area pt-100 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="showcase-title pt-25">
                        <h2 class="title">Gallery</h2>
                    </div> <!-- showcase title -->
                </div> 
                <div class="col-lg-6">
                    <div class="showcase-title pt-25">
                        <p></p>
                    </div> <!-- showcase title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="showcase-active mt-65">
                        <?php foreach($gallery as $gallery) :?>
                        <div class="single-showcase">
                            <img src="uploads/gallery/<?= $gallery->gambar?>" alt="Gallery">
                            <?php if($gallery->description){?>
                            <a href="https://www.instagram.com/miqumimutuban/" class="main-btn"><?= $gallery->description?></a>
                            <?php }?>
                        </div> <!-- single showcase -->
                        <?php endforeach;?>
                    </div> <!-- showcase active -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SHOWCASE PART ENDS ======-->

    <!--====== TEAM PART START ======-->
    
    <section id="team" class="team-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">Testimoni</h3>
                        <p>Berikut Testimoni Pelanggan Kami .</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <?php foreach($testimoni as $testimoni) :?>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="uploads/testimoni/<?= $testimoni->gambar_testimoni?>"
                             alt="Testimoni">
                        </div>
                        <div class="team-content mt-30">
                            <h4 class="title mb-10"><a ><?= $testimoni->nama_testimoni?></a></h4>
                            <span><?= $testimoni->kedudukan_testimoni ? $testimoni->kedudukan_testimoni : "" ?></span>
                            <ul class="social mt-15">
                                <?php if($testimoni->link_fb){?>
                                <li><a href="<?= $testimoni->link_fb?>"><i class="lni-facebook-filled"></i></a></li>
                                <?php }else if($testimoni->link_ig){?>
                                <li><a href="<?= $testimoni->link_ig?>" target="_blank"><i class="lni-instagram"></i></a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div> <!-- single temp -->
                </div>
                <?php endforeach;?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEAM PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->
    
    <section id="testimonial" class="testimonial-area pt-200">
        <div class="testimonial-bg bg_cover" style="background-image: url(assets/images/testimonial/bg-testi.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <div class="testimonial-content">
                        <div class="testimonial-active">
                            <?php foreach($testimoniSecond as $testimoni1) :?>
                            <div class="single-testimonial">
                                <i class="lni-quotation"></i>
                                <p class="mb-30"><?= $testimoni1->pesan_testimoni?>.</p>
                                <h6 class="title"><?= $testimoni1->nama_testimoni?></h6>
                                <span><?= '-' .$testimoni1->kedudukan_testimoni ? '-' .$testimoni1->kedudukan_testimoni : "" ?></span>
                            </div> <!-- single testimonial -->
                            <?php endforeach;?>
                        </div> <!-- testimonial active -->
                    </div> <!-- testimonial content -->
                </div>
                <div class="col-lg-7 col-md-4">
                    <div class="testimonial-play text-right d-none d-md-block">
                        <a class="Video-popup" href="https://www.youtube.com/watch?v=l8ccw7BMrMA"><i class="lni-play"></i></a>
                    </div> <!-- testimonial play -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--======  BLOG PART START ======-->
    
    
    <!--======  BLOG PART ENDS ======-->

    <!--====== CONTACT PART START ======-->
    
    <section id="contact" class="contact-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-title text-center">
                        <h2 class="title">Temukan Kami</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-70">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Contact Info</h4>
                            <ul>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>+62 852-3589-8303</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>miqumimutuban@gmail.com</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>Jl. Delima No.9, Perbon, Kec. Tuban, Kabupaten Tuban, Jawa Timur 62310</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form" id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.043644917812!2d112.0353321!3d-6.8892957!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc5a890556f449eb9!2sMIQU%20MIMU%20Tuban!5e0!3m2!1sen!2sid!4v1597658176230!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
            </div> <!-- contact box -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->