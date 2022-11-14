@extends('layouts.homeLayout')
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">           
            <div class="col-sm-12">                         
                <h2 class="title text-center">About <strong>Us</strong></h2>  
              
                    <div class="">
                        <img src="{{ asset('assets/images/home/logo.jpeg')}}" width="60%" height="150px">
                        </div>
                        <div class="card justify">
                            <div class="card-heading">
                        <h4><strong>Friendship, Integrity and Quality</strong></h4>
                        </div>
                        <div>
                        <p>
                        Thank you for your trust, friendship and business over the past years. We at GearUp Archery Supply (GAS) have been blessed to be able to share our love of archery with you all throughout the years and look forward to many more. Friendship, Integrity and Quality are the core values chosen as most important by our entire staff, not empty words used by an advertising agency. Since out inception, we have constantly sought to improve and expand our service and selection in order to serve you beyond your expectations. We have a large selection of top quality Target, Bowhunting and Traditional Archery equipment in stock and available to you immediately upon your call.</p>
                        <p>
                        I would like to personally thank each of our customers and our partners for allowing us to serve your archery needs and for recommending us to others in archery. We take our responsibilities to you seriously as we look forward to helping you achieve your shooting or archery business goals. Each of us shares your love of archery, whether you enjoy Olympic Recurve, Target Archery, Traditional, Bow Hunting or shooting for recreation. Our staff shoots every form of archery with a deep passion and love of the sport.
                        </p>
                    </div>
                    <div>
                        <p>
                        <strong>Our Technical Support Team</strong>, are ready to exceed your expectations of what an archery distributor should do for you! They will gladly answer your most technical or basic questions to give you peace of mind as we assist you in choosing the best archery equipment available for your unique needs. Rest assured that your business is appreciated by our staff of knowledgeable fellow archers who know and use the items we sell so you can trust that we can make sure that they are right for your type of shooting.</p>
                    </div>
                    <div>
                        <h4>Our Reputation</h4>
                        <p>
                        Our trusted reputation for professional, fast, and courteous service is well known. We evaluate, select, sell, and service only the finest quality archery products. This is why we are the company of choice for numerous archery clubs across the federation.</p>
                    </div>
                    <div>
                        <h4>Our Commitment to You</h4>
                        <p>
                        We are committed to providing archery equipment to businesses, organizations and individuals as a fast growing archery distributor. We maintain our leadership through integrity, technical expertise, and a continuing focus on excellence in service to our customers. We promote archery with a passion in our efforts to facilitate the growth of the sport and our company while focusing on the highest quality in order to continuously improve our value to our customers, vendors and GAS team members.</p>
                        <p>
                        </div>
                        <div>
                        <strong>THANK YOU</strong> for joining our growing circle of friends from all around the world. We know that you will find no finer source for all of your archery needs. Don't settle for anything less, EXCEL with us! Visit this website frequently for the latest news, specials, calendar of events and products. Take your best shot and give us a visit, call, or e-mail.</p>
                        <p> You will be happy you did.</p>
                    </div>
                        <h3>Aliyu Abubakar. G</h3>

                        <strong><i>Managing Director, GearUp Archery Supply</i></strong><br><br>

                    
                </div>                                                      
                
            </div>                  
        </div>      
        <div class="row">   
            {{-- <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="../mail/sendmail.php">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div> --}}
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p><strong>GearUp and Multi Ventures</strong></p>
                        <p>Damboa Road, Behind NNPC Depot.</p>
                        <p>Maiduguri, Borno.</p>
                        <p><strong>Mobile:</strong> +234-9155445455</p>
                        <p><strong>Mobile:</strong> +234-7039990099</p>
                        <p><strong>Email: </strong>info@gearuparcheryshop.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>              
        </div>  
    </div>  
</div><!--/#contact-page-->
@endsection