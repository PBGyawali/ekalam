<!-- Footer_Open -->
<section class="last text-center pt-3 text-white bg-dark" >
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <a href="./">
                            <img src="{{config('constants.asset_url').'/logo'}}/logo.png" alt="" class="img img-fluid">
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <i class="fa fa-map-marker"></i>
                        Kathmandu 44600, Nepal
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <i class="fa fa-phone"></i>
                        977-1-4117578, 4111583, 4111849.
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-left">
                        <i class="fa fa-envelope"></i>
                        info@enews.com
                    </div>
                </div>
            </div>
            <div class="col-4 text-left">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Reach Us</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('contacts')}}"style="color:#fff">Contact</a><br>
                        <a href="{{route('support')}}"style="color:#fff">Support</a><br>
                        <a href="{{route('ad')}}"style="color:#fff">Advertise</a>
                    </div>
                </div>
            </div>
            <div class="col-4 text-left">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">e-news</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('about')}}" style="color:#fff">About</a><br>
                        <a href="{{route('career')}}"style="color:#fff">Carrer</a><br>
                        <a href="https://www.facebook.com" style="color: #fff"><i class="fab fa-facebook"> facebook</i></a><br>
                        <a href="https://www.twitter.com"style="color: #fff"><i class="fab fa-twitter"> twitter</i></a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container container-fluid" style="padding-bottom: 10px;">
        © 2019-{{ date('Y') }} {{ucwords( config('app.name', 'enews'))}}.com All Rights Reserved <a href="{{route('privacy')}}">Privacy Policy</a>
    </div>
</section>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
