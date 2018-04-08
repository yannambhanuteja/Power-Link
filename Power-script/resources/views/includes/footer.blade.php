<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            <title>Excel To HTML using codebeautify.org</title>
        </head>
        <body>
            <?php

            $nav_foo_color = App\Settings::orderBy('created_at','desc')->first()->nav_foo_color;

            ?>
            <footer class="@if($nav_foo_color) {{$nav_foo_color}} @else blue darken-4 @endif page-footer">
                <div class="center-align">
                    <!-- Facebook -->
        @if($Settings && $Settings->facebook)
        
                    
                    <a class="pulse-shrink hoverable z-depth-3 btn-floating btn-large waves-effect waves-light blue darken-2" href="{{$Settings->facebook}}" title="">
                        <i class="fa white-text fa-facebook"></i>
                    </a> @endif

        
                    
                    <!-- Google plus -->
        @if($Settings && $Settings->google_plus)
        
                    
                    <a class="pulse-shrink hoverable z-depth-3 btn-floating btn-large waves-effect waves-light red" href="{{$Settings->google_plus}}" title="">
                        <i class="fa fa-google-plus"></i>
                    </a> @endif

        
                    
                    <!--Twitter-->
        @if($Settings && $Settings->twitter)
        
                    
                    <a class="pulse-shrink hoverable z-depth-3 btn-floating btn-large waves-effect waves-light blue" href="{{$Settings->twitter}}" title="">
                        <i class="fa fa-twitter"></i>
                    </a> @endif
        
                    
                    <!--Instagram-->
        @if($Settings && $Settings->instagram)
        
                    
                    <a class="pulse-shrink hoverable z-depth-3 btn-floating btn-large waves-effect waves-light purple" href="{{$Settings->instagram}}" title="">
                        <i class="fa fa-instagram"></i>
                    </a> @endif
        
                    
                    <!--Youtube-->
        @if($Settings && $Settings->youtube)
        
                    
                    <a class="pulse-shrink hoverable z-depth-3 btn-floating btn-large waves-effect waves-light red" href="{{$Settings->youtube}}" title="">
                        <i class="fa fa-youtube"></i>
                    </a>
                </div>

    @endif



    
                
                <div class="center-align footer-copyright">
                    <div class="container">
                        <br> @if($Settings && $Settings->footer_text)
            
                            
                            <div class="center-align white-text">
                {{$Settings->footer_text}}
            </div>

            @endif

        
                        
                        </div>
                    </div>
                    <br>
                        <div class="center-align col l4 offset-l2 s12">
                          <a class="grey-text text-lighten-3" href="/paymentproofs">Payment Proofs</a>
                            <a class="white-text"> | </a>

                            <a class="grey-text text-lighten-3" href="/contact">Contact</a>
                            <a class="white-text"> | </a>
                            <a class="grey-text text-lighten-3" href="/faqs">FAQ'S</a>
                        </div>
                        <div class="right-align">
                            <a class="pulse-shrink white hoverable z-depth-4 blue-text btn waves-light waves-effect">
                                <i class="fa fa-cc-paypal" aria-hidden="true"></i> PayPal  
                            
                            </a>
                        </div>
                    </footer>
                    <style>
    footer.page-footer {
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1rem;
        clear: both;
    }
</style>
                </body>
            </html>