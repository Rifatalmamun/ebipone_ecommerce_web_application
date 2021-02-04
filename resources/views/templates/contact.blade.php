
@extends('layouts.app')
@section('content')


<div class="site__body">
    
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="{{route('welcome')}}" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Contact us</span></li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Contact Us</h1> 
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container container--max--lg">


<div class="contacts__map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.8917037721222!2d89.3659682362486!3d23.37854689935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff01de7243ae31%3A0xe5d6bfa775ceeda4!2z4KaG4Kah4Ka84Kaq4Ka-4Kah4Ka84Ka-IOCmruCngeCmleCnjeCmpOCmv-Cmr-Cni-CmpuCnjeCmp-CmviDgppXgpq7gpqrgp43gprLgp4fgppXgp43gprgg4Kat4Kas4Kao!5e0!3m2!1sen!2sbd!4v1609395449248!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>




            <div class="card">
                <div class="card-body card-body--padding--2">
                    <div class="row">
                        <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                            <div class="mr-1">
                                <h4 class="contact-us__header card-title">Our Address</h4>
                                <div class="contact-us__address">
                                    <p>
                                    	<i class="fas fa-home"></i> Arpara, Magura, Bangladesh <br>
                                    	<i class="fas fa-envelope-open"></i> ebipone@gmail.com <br>
                                        <i class="fas fa-phone-square-alt"></i> +88 01301 299194
                                    </p>
                                    
                                    <p>
                                    	<strong>Opening Hours</strong><br>
										Saturday to Thusday: 08:00 AM to 08:00 PM <br>
										Friday: 10:00 AM to 05:00 PM 
										

                                    </p>

                                    <p>
                                        <strong>Comment</strong><br />
                                        You can contact us at any time. We are always engaged in your cooperation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="ml-1">
                                <h4 class="contact-us__header card-title">Leave us a Message</h4>
                            
                                
                                <form action="{{route('customer.send.message')}}" method="POST">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label for="form-name">Your Name</label> 
                                            <input type="text" id="form-name" class="form-control" placeholder="Your Name" name="name" required />                                                  
                                        </div>
                                        <div class="form-group col-md-6"><label for="form-email">Email</label> <input type="email" id="form-email" class="form-control" placeholder="Email Address" name="email" required />
                                        </div>                                                                
                                    </div>


                                    <div class="form-group"><label for="form-message">Message</label> 
                                            <textarea id="form-message" class="form-control" rows="4" name="comment" required ></textarea>                          
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>







@endsection
