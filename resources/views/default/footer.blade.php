<footer>
    <div class="footer-first pd50">
        <div class="container">
            <div class="row">
                @php
                    $siteinfo = DB::table('siteinfos')->select('address','phone','email')->get();
                    // $siteinfo = App\Siteinfo::get();
                @endphp
                <div class="col-12 col-md-6 col-lg-4">                    
                    <h5>{{ __('Contact Information') }}</h5>
                    <ul class="contact_item">
                        <li><i class="fas fa-map-marker"></i><p><?php echo $siteinfo[0]->address?></p></li>
                        <li><i class="fas fa-phone"></i><p><?php echo $siteinfo[0]->phone?></p></li>
                        <li><i class="fas fa-envelope"></i><p><?php echo $siteinfo[0]->email?></p></li>
                    </ul>
                </div>  
                <div class="col-12 col-md-6 col-lg-3">
                    <h5>{{ __('Related Links') }}</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <h5>{{ __('To Inquire') }}</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <h5>{{ __('Social Media') }}</h5>
                </div>                
                         
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center text-md-left">
                    <p class="m-0">© 2020 Raffles Hospital Myanmar. All rights reserved.</p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right">
                    <p class="m-0">Create by <a href="https://digitaldots.com.mm" title=""><img src="{{url('http://raffleshospital.myanmarcafe.trade/wp-content/themes/raffleshospital/assets/images/digitaldots.png')}}" alt="" class="img-fluid"></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>