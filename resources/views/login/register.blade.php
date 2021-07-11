<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form">
<center><img src="dist/img/logo.png" width="300" ></center>
      <ul class="tab-group">
        <li class="tab"><a href="register">Sign Up</a></li>
        <li class="tab"><a href="login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="store" method="POST">
          @csrf
          
            <div class="field-wrap">
              <!--<label>
                Email Address<span class="req">*</span>
              </label>-->
              <input type="text"required autocomplete="off" name="business_name" placeholder="Business Name*"/>
            </div>
          <div class="top-row">
            <div class="field-wrap">
              <!--<label>
                First Name<span class="req">*</span>
              </label>-->
              <input type="text" required autocomplete="off" name="first_name" placeholder="First Name *"/>
            </div>
        
            <div class="field-wrap">
              <!--<label>
                Last Name<span class="req">*</span>
              </label>-->
              <input type="text"required autocomplete="off" name="last_name" placeholder="Last Name *"/>
            </div>
          </div>
          <div class="top-row">
            <div class="field-wrap">
              <!--<label>
                First Name<span class="req">*</span>
              </label>-->
              <input type="text" required autocomplete="off" name="contact_number" placeholder="Contact Number *"/>
              @error('contact_number')
              <div>{{$message}}</div>
              @enderror
              
            </div>
        
            <div class="field-wrap">
              <!--<label>
                Last Name<span class="req">*</span>
              </label>-->
              <input type="text"required autocomplete="off" name="start_date" placeholder=" Start Date *"/>
            </div>
          </div>

          <div class="field-wrap">
            <!--<label>
              Email Address<span class="req">*</span>
            </label>-->
            <input type="text"required autocomplete="off" name="business_add" placeholder="Business Address *"/>
          </div>

          <div class="top-row">
            <div class="field-wrap">
              <!--<label>
                First Name<span class="req">*</span>
              </label>-->
              <input type="text" required autocomplete="off" name="country" placeholder="Country *"/>
            </div>
        
            <div class="field-wrap">
              <!--<label>
                Last Name<span class="req">*</span>
              </label>-->
              <input type="text"required autocomplete="off" name="state"  placeholder=" State*"/>
            </div>
          </div>

          <div class="top-row">
            <div class="field-wrap">
              <!--<label>
                First Name<span class="req">*</span>
              </label>-->
              <input type="text" required autocomplete="off" name="city" placeholder="City*"/>
            </div>
        
            <div class="field-wrap">
              <!--<label>
                Last Name<span class="req">*</span>
              </label>-->
              
              <input type="text"required autocomplete="off" name="zipcode" placeholder=" Zip Code*"/>
              @error('zipcode')
              <div>{{$message}}</div>
              @enderror
            </div>
          </div>


          
          <div class="field-wrap">
            <!--<label>
              Email Address<span class="req">*</span>
            </label>-->
            <input type="text"required autocomplete="off" name="email" placeholder="Email Address *"/>
            @error('email')
              <div>{{$message}}</div>
              @enderror  
          </div>
          
          <div class="field-wrap">
            <!--<label>
              Set A Password<span class="req">*</span>
            </label>-->
            <input type="password"required autocomplete="off" name="pass"  placeholder="Password *"/>
            @error('pass')
            <div>{{$message}}</div>
            @enderror
          </div>
          
          <button type="submit" class="button button-block"/>Sign-UP</button>
          
          </form>

        </div>
        
        <div id="login">   
          
          
          

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
  <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>-->

</body>
</html>
