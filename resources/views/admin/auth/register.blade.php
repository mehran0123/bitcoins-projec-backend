@include('layouts.master_header')

  <body style="overflow:hidden;">
      <style>
          .auth-header{
              padding:0;
            background-color: #0000 !important;
          }
          /*.btn-block{*/
          /*  background-color: #b0d5aa !important;*/
          /*}*/
          #background-video {
    position: absolute;
    top: 0;
    width: 100%;
    left: 0;
    z-index: -1;
    height: 150vh;
}
.auth{
      background-color: #0000 !important;
}
body {
    background-color: #ffffff00;
}
video {
    width: 100%;
    position: absolute;
}
.auth {
    justify-content: center;
}
footer.auth-footer {
    display: none;
}
.btn-block {
    background-color: #fee715ff !important;
    color: #101820ff;
    font-weight: 900;
    border-color: #101820ff;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000000;
    background-color: #ffffff;
}
.text-danger {
    color: #ff8383!important;
}
.auth-form {
    padding: 3rem 2rem 1rem;
    max-width: 420px;
    border-radius: 0.25rem;
    background-color: #222230;
    box-shadow: 0 0 0 1px rgb(20 20 31 / 5%), 0 1px 3px 0 rgb(20 20 31 / 15%);
    background: rgba( 0, 0, 0, 0.45 );
    box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
    backdrop-filter: blur( 3px );
    -webkit-backdrop-filter: blur( 3px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.gradient-custom-3 {
  /* fallback for old browsers */
  background: #84fab0;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
  /* fallback for old browsers */
  background: #84fab0;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
h1.signup-title {
    text-align: center;
    color: #fee715;
    text-shadow: 2px -2px black;
}
a {
    color: #fee715;
}
label {
    color: #fee715;
    text-shadow: 1px 1px 1px black;
    margin-top: 15px;
}
.form-control {
    font-size: 12px;
}
  .auth-form {
    padding: 3rem 2rem 1rem;
    max-width: 600px;
      
  } 
      </style>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <video autoplay muted loop>
     <source src="{{ URL::to('/public/admin/assets/videoplayback.mp4')}}" type="video/mp4">
    </video>
     <main class="auth" style="/*background-image: url({{ URL::to('/public/admin/assets/images/bg.gif') }});*/">
      <!--<header id="auth-header" class="auth-header" style="/*background-image: url({{ URL::to('/public/admin/assets/images/bg.gif') }});*/">-->
      <!--  <h1>-->
      <!--      <img src="{{ URL::to('/public/admin/assets/user.jpg') }}" alt="Logo Image" height="100px" width="100px">-->

      <!--     <span class="sr-only">Sign In</span>-->
      <!--  </h1>-->
      <!--  <p> Bitcoins-->
      <!--  </p>-->
      <!--</header><!-- form -->
      <form method="post" onsubmit="return false"  class="auth-form">
          <div class="form-group">
          <div class="form-label-group">
            <h1 class="signup-title">Sign In</h1>
          </div>
        </div><!-- /.form-group -->
         <div class="form-row">
            <div class="col-md-4">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" placeholder="Enter First Name" class="form-control"/>
                <small id="first_name_error" class="text-danger"></small>
            </div>
            <div class="col-md-4">
                <label for="first_name">Last Name</label>
                <input type="text" placeholder="Enter Last Name" class="form-control" id="last_name">
                <small id="last_name_error" class="text-danger"></small>
            </div>
                <div class="col-md-4">
                    <label for="email">Eamil</label>
                    <input type="email" placeholder="Enter your email" class="form-control" id="email">
                    <small id="email_error" class="text-danger"></small>
                </div>
                <div class="col-md-4">
                    <label for="phone">Phone No.</label>
                    <input type="number" placeholder="Enter User phone number" class="form-control" id="phone">
                    <small id="phone_error" class="text-danger"></small>
                </div>
                <div class="col-md-4">
                    <label for="cnic_number">CNIC No.</label>
                    <input type="text" placeholder="Enter CNIC number" class="form-control" id="cnic_number">
                    <small id="cnic_number_error" class="text-danger"></small>
                </div>
                <div class="col-md-4">
                    <label for="sponcer_by">Sponcer By (Referral No.)</label>
                    <input type="text" placeholder="Referral No." class="form-control" id="sponcer_by">
                    <small id="sponcer_by_error" class="text-danger"></small>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-lg-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autofocus/>
                    <span class="form-text text-danger" id="password_error"></span>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password"/>
                    <span class="form-text text-danger" id="confirm_password_error"></span>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 mb-4">
                <label class="mr-2">Profile Image</label>
                <div class="group-contain" style="display: flex;">
                   <div class="btn btn-secondary fileinput-button" style="line-height: 2;height: 40px;">
                      <i class="fa fa-plus fa-fw"></i> <span>Add File</span>
                      <input id="fileupload-btn-one" type="file" name="file-one" accept="image/*">
                   </div>
                   <div class="form-group" style="display: block;margin: 0 auto;">
                      <div id="uploadList" class="list-group list-group-flush list-group-divider" style="margin: auto;">
                         <img src="#" alt="Preview Image" id="blah-one" class="d-none" height="100px">
                      </div>
                   </div>
                </div>
                <!-- /.form-group -->
                <small id="image_one_error" class="text-danger"></small>
        </div>
            <br>
        <button class="btn btn-primary btn-lg btn-block" id="add_user">Become Partner</button>
      </form><!-- /form .needs-validation -->
@include('admin.auth.js.create')
@include('layouts.master_footer')
  </body>
</html>
