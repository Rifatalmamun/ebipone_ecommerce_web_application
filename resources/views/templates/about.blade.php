
@extends('layouts.app')
@section('content')






            <!-- site__body -->
            <div class="site__body">
                <div class="about">
                    <div class="about__body">
                        <div class="about__image">
                            <div class="about__image-bg" style="background-image: url('public/frontend/images/about-1903x1903.jpg');"></div>
                            <div class="decor about__image-decor decor--type--bottom">
                                <div class="decor__body">
                                    <div class="decor__start"></div>
                                    <div class="decor__end"></div>
                                    <div class="decor__center"></div>
                                </div>
                            </div>
                        </div>
                        <div class="about__card">
                            <div class="about__card-title">About Us</div>
                            <div >
                                ebipone.com is a completely hassle-free largest online shopping mall in Bangladesh. Now shopping is easier, faster and always joyous. We help you make the right choice here. eBipone showcases products from all categories such as clothing, footwear, jewelry, accessories, electronics, appliance, books, restaurants, health & beauty, and still counting! Our collection combines the latest in fashion trends as well as the all-time favorites. Our products are exclusively selected for you. We, at eBipone , have all that you need under one umbrella.
                            </div>
                            <div class="about__card-author">Mithun Kumar Ray<br>Managing Director, eBipone Ltd.</div>
                            <div class="about__card-signature"><img src="{{asset('public/frontend/images/signature.jpg')}}" width="160" height="55" alt="" /></div>
                        </div>
                        <div class="about__indicators">
                            <div class="about__indicators-body">
                                <div class="about__indicators-item">
                                    <div class="about__indicators-item-value">{{$shop}}</div>
                                    <div class="about__indicators-item-title">Online Shop</div>
                                </div>
                                <div class="about__indicators-item">
                                    <div class="about__indicators-item-value">{{$product}}</div>
                                    <div class="about__indicators-item-title">Online Product</div>
                                </div>
                                <div class="about__indicators-item">
                                    <div class="about__indicators-item-value">{{$user}}</div>
                                    <div class="about__indicators-item-title">Our Customer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dirictors Board -->


				<div class="block-space block-space--layout--divider-xl" ></div>
                <div class="block block-teammates">
                    <div class="container container--max--xl">
                        <div class="block-teammates__title">Board of directors</div>
                        <div class="block-teammates__subtitle">Meet this is our board of directors</div>
                        <div class="block-teammates__list ">
                            <div class="owl-carousel" >
                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/jotikaray.jpg')}}" alt="Jotika Ray" title="Jotika Ray, Chairman" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Jotika Ray</div>
                                        <div class="teammate__position">Chairman</div>
                                    </div>
                                </div>
                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/mithunkumarray.jpg')}}" alt="Mithun Kumar Ray" title="Mithun Kumar Ray, CEO & Founder"  /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Mithun Kumar Ray</div>
                                        <div class="teammate__position">CEO & Founder</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>





                <!--  Management Team -->
                <div class="block-space block-space--layout--divider-xl"></div>
                <div class="block block-teammates">
                    <div class="container container--max--xl">
                        <div class="block-teammates__title">Management Team</div>
                        <div class="block-teammates__subtitle">Meet this is our management team.</div>
                        <div class="block-teammates__list">
                            <div class="owl-carousel">

                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/rashelhasan.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Md Rashel Hasan</div>
                                        <div class="teammate__position">Management Officer</div>
                                    </div>
                                </div>

                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/asikuzzaman.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Md. Ashikur Rahman</div>
                                        <div class="teammate__position">Web System Admin</div>
                                    </div>
                                </div>

                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/ranamahmud.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Md. Rana Mahamud</div>
                                        <div class="teammate__position">Product Source Officer</div>
                                    </div>
                                </div>
                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/mohinoolislam.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Md. Mohinool Islam</div>
                                        <div class="teammate__position">Product Source Officer</div>
                                    </div>
                                </div>

                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/wakeryounus.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">B.M. Waker Younus</div>
                                        <div class="teammate__position">Product Source Officer</div>
                                    </div>
                                </div>
                                <div class="block-teammates__item teammate">
                                    <div class="teammate__avatar"><img src="{{asset('public/frontend/images/teammates/kazisifulislam.jpg')}}" alt="" /></div>
                                    <div class="teammate__info">
                                        <div class="teammate__name">Kazi Siful Islam</div>
                                        <div class="teammate__position">Product Source Officer</div>
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>


                                
                <div class="block-space block-space--layout--before-footer"></div>


            <!-- site__body / end -->






@endsection
