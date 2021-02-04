
@extends('layouts.app')
@section('content')



<div class="site__body">
    <div class="block-space block-space--layout--spaceship-ledge-height"></div>
    <div class="block">
        <div class="container">
            <div class="document">
                <div class="document__header">
                    <h1 class="document__title">Privacy Policy</h1>
                    <div class="document__subtitle">www.ebipone.com</div>
                </div>
                <div class="document__content card">
                    <div class="typography">
                        <p style="color: red; font-style: italic;">Last Update January 1, 2021</p>
                        <h3>General</h3>
                        <p>The privacy of our visitors is of extreme importance to us. Your privacy is like me. We think we should protect your privacy. So eBipone Publishing privacy policy that there is no problem with visiting / registration you on this site. We reserve the right to change this policy at any time. </p>
                        <ol>
                            <li>
                                <strong>Cookies</strong> — eBipone does use cookies to store information about visitors preferences. We customize web site content based on visitors browser type or other information that the visitor sends via their browser.
                            </li>
                            <li><strong>Use of Credit/debit cards:</strong> — Shopping at eBipone is 100% safe. All of your using cards payments of eBipone are processed through secure and trusted payment getaways sslcommerz.
                            </li>
                            <li>
                                <strong>Log</strong> — eBipone use log files, as like many other websites. Inside the log files, we store information of IP address, type of browser, ISP and number of the clicks to analyze affiliate.
                            </li>
                            <li>
                                <strong>Advertisement</strong> — Some of our advertising partners may use cookies to serve ads on eBipone. So there has no access to control over these cookies that are used by third-party advertisers.
                            </li>
                        </ol>
                        <h3>Contact</h3>


                        <p>For information about privacy policy you can contact us, please visit our <a href="{{route('contact')}}">contact page</a>.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>

@endsection
