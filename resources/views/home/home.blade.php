@extends('home-master')

<!-- page title -->
@section('page-title')  
{{$seo['seotitle']}}
@endsection
@section('seo-keyword')
{{$seo['seokeyword']}}  
@endsection
@section('seo-description')  
{{$seo['seodescription']}}
@endsection

<!-- page content -->
@section('content')
<div class="container-fluid home-header-title" id="home"
style="background-image:url('public/uploads/{{$banner['image']}}')">
  <div class="content">
    <h1>{{$banner['title']}}</h1>
    <p >{!!$banner['description']!!}</p>
    
    @if(isset($banner['facebook']))
    <a href="{{$banner['facebook']}}" target="_blank"><i class="fab fa-facebook"></i></a>
    @endif
    @if(isset($banner['twitter']))
    <a class="round-circle" href="{{$banner['twitter']}}" target="_blank"><i class="fab fa-twitter"></i></a>
    @endif
    @if(isset($banner['linkedin']))
    <a class="round-circle" href="{{$banner['linkedin']}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    @endif
    @if(isset($banner['youtube']))
    <a class="round-circle" href="{{$banner['youtube']}}" target="_blank"><i class="fab fa-youtube"></i></a>
    @endif
  </div>
</div>

<!-- about section -->
<div class="container-fluid about-content" id="about">
  <h1>{{$about['title']}}</h1>
  <div class="row about">
    <div class="col-md-6">
      <div class="imgdeuda">
        <img src="{{url('public/uploads/'.$about['image'])}}" alt="deuda-naach.jpeg" class="img-fluid">
      </div>
    </div>
    <div class="col-md-6 aboutme">
      {!!$about['description']!!}
    </div> 
  </div>
</div>

  <!-- Gallery-Contents -->

  <div class="container-fluid gallery" id="gallery">
    <h1>Gallery.</h1>
   
      <div class="row galleryimage">
         @foreach($gallery as $g)
        <div class="col-md-3">
          <div class=" image">
            <a href="{{url('public/uploads/deuda1.jpeg')}}" data-lightbox="mygallery">
              <img src="{{url('public/uploads/'.$g['image'])}}" alt="{{$g['imagedescription']}}" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
      </div>
        
        
       
        
      </div> 
    </div>
  </div>

  
  <!-- Contact-Us Contents -->

  <div class="container-fluid contact-us" id="contact">
    <h1>Contact Us.</h1>
    <div class="container">
      <div class="row contact-icon">
        <div class="col-md-4">
          <i class="fas fa-location-arrow" class="rounded-circle"></i>
          <h5>Address</h5>
          <p>{{$contactdetail['address']}}</p>
        </div>
        <div class="col-md-4">
          <i class="fas fa-envelope"></i>
          <h5>Email</h5>
          <p>{{$contactdetail['email']}}</p>
        </div>
        <div class="col-md-4">
          <i class="fas fa-phone"></i>
          <h5>Phone</h5>
          <p>$contactdetail['phone</p>
        </div>
      </div>
      <form action="{{url('/storecontactfront')}}" method="post">
        @csrf
        <div class="form-row form-row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control" name="name" id="inputname4" placeholder="Name" value="{{old('name')}}" required>
            <div class="text text-danger">{{ $errors->first('name') }}</div>
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" value="{{old('email')}}" required>
            <div class="text text-danger">{{ $errors->first('email') }}</div>
          </div>
          <input type="hidden" class="form-control" name="status"  value="Not Replied">
          <div class="form-group col-md-12">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5" placeholder="Message" required>{{old('message')}}</textarea>
            <div class="text text-danger">{{ $errors->first('message') }}</div>
          </div>
          <input type="hidden" class="form-control" name="status"  value="Not Replied">
          <div class="button">
            <button class="submit-button" >Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection