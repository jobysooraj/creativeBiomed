 <footer id="footer" class="footer dark-background">

     <div class="container footer-top">
         <div class="row gy-4">
             <div class="col-lg-4 col-md-6 footer-about">
                 <a href="index.html" class="logo d-flex align-items-center">
                     <span class="sitename">Creative Biomed</span>
                 </a>
                 <div class="footer-contact pt-3">
                     <p>{{$settings[0]->company_address ?? ''}}</p>

                     <p class="mt-3"><strong>Phone:</strong> <span>{{$settings[0]->phone}}</span></p>
                     <p><strong>Email:</strong> <span>{{$settings[0]->email}}</span></p>
                 </div>
                 <div class="social-links d-flex mt-4">
                     <a href="{{$settings[0]->facebook_id}}"><i class="bi bi-facebook"></i></a>
                     <a href="{{$settings[0]->instagram_id}}"><i class="bi bi-instagram"></i></a>
                     <a href="{{$settings[0]->whatsapp_id}}"> <i class="bi bi-whatsapp"></i>
                     </a>
                 </div>
             </div>

             <div class="col-lg-2 col-md-3 footer-links">
                 <h4>Useful Links</h4>
                 <ul>
                     <li><a href="{{route('website.home')}}">Home</a></li>
                     <li><a href="{{route('website.about')}}">About us</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Terms of service</a></li>
                     <li><a href="#">Privacy policy</a></li>
                 </ul>
             </div>

             <div class="col-lg-2 col-md-3 footer-links">
                 {{-- <h4>Our Services</h4>
                 <ul>
                     <li><a href="#">Web Design</a></li>
                     <li><a href="#">Web Development</a></li>
                     <li><a href="#">Product Management</a></li>
                     <li><a href="#">Marketing</a></li>
                     <li><a href="#">Graphic Design</a></li>
                 </ul> --}}
             </div>

             <div class="col-lg-4 col-md-12 footer-newsletter">
                 <img src="{{ asset('storage/' .  $settings[0]->logo_image) }}" width="100" height="100"alt="">

             </div>

         </div>
     </div>

     <div class="container copyright text-center mt-4">
         <p>© <span>Copyright</span> <strong class="px-1 sitename">Creative Biomed</strong> <span>All Rights Reserved</span></p>
         <div class="credits">
             <!-- All the links in the footer should remain intact. -->
             <!-- You can delete the links only if you've purchased the pro version. -->
             <!-- Licensing information: https://bootstrapmade.com/license/ -->
             <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
             Designed by <a href="https://bootstrapmade.com/">Dawson Walsh</a> Distributed by <a href=“https://themewagon.com>Creative Biomed
         </div>
     </div>

 </footer>
