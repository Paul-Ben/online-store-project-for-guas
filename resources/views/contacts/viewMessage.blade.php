@extends('dashboard')
@section('content')


    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">           
                <div class="col-sm-12">                         
                                                                     
                   
                </div>
                @if ($message = Session::get('message'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif                 
            </div>      
            <div class="row">   
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Message</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" action="" method="post">
                            
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" value="{{$contact->name}}" required="required" placeholder="Name" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" value="{{$contact->email}}" required="required" placeholder="Email" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" value="{{$contact->subject}}" required="required" placeholder="Subject" disabled>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" value="{{$contact->message}}" class="form-control" rows="8" placeholder="Your Message Here" disabled>{{$contact->message}}</textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                               
                                <a class="btn btn-primary pull-right" href="{{route('contact.index')}}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>  
        </div>  
    </div><!--/#contact-page-->






    
@endsection