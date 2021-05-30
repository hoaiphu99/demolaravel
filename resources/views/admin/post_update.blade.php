@extends('admin.master')
@section('title', 'Post_Update')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <title>Bootstrap Example</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div  ng-controller="MyController">
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-table bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>Cập Nhật Bài Đăng</h4>
                            </div>
                        </div>
                        <hr>
                        {{--<div>--}}
                            {{--<button type="button" class="btn btn-primary btn-insert" >Thêm</button>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{url('admin/dashboard')}}">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('admin/post_update')}}">Bài Đăng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class = "card text-center">
            <div class = "card-header">
                <h2>Form Update</h2>
                <!-- <p>In this example, we use <code>.needs-validation</code>, which will add the validation effect AFTER the form has been submitting (if there's anything missing).</p>
                <p>Try to submit this form before filling out the input fields, to see the effect.</p> -->
            </div>
            <div class="card-body">
                @foreach($posts->data as $p)
                <form action="{{ route('post.update', $p->id) }}" method="post" enctype="multipart/form-data">
                    <!-- class="needs-validation" novalidate="true" -->
                    @csrf
                    <div class="form-group">
                        <label for="nd">Nội Dung:</label>
                        <input type="text" class="form-control" id="nd" placeholder="Enter Content" name="content" value="{{$p->content}}" required="required" height="50"/>
                        <!-- <textarea class="form-control" id="nd" rows="5" placeholder="write something" name="content" value="{{$p->content}}" required="required"></textarea> -->
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="uname">Người Đăng:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user_id" value="{{$p->user->name}}" required="required" size="50"/>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình Ảnh:</label>
                        <br>
                        <img src="{{$p->image}}" alt="" height="300" width="300">
                        <div class="col-sm-offset-5 col-sm-10">
                            <label class="fileContainer">
                                Edit Display Photo
                                <input type="file" id="image" name="image" required="required"/>
                            </label>
                        </div>
                        <!-- <div class="user-avatar">
                            <figure>
                                <img src="{{$p->image}}" alt="" height="300" width="300">
                                <form class="edit-phto">
                                    <i class="fa fa-camera-retro"></i>
                                    <label class="fileContainer">
                                        Edit Display Photo
                                        <input type="file" id="image" name="image" required="required"/>
                                    </label>
                                </form>
                            </figure>
                        </div> -->
                        <!-- <img src = "{{ $p->image }}" alt = "" height="200" width="200">
                        <div class="col-md-auto col-sm-6">
                            <input type="file" class="form-control" id="image" name="image" required="required"/>
                        </div> -->
                    </div>
                    <!-- <form class="edit-phto">
                        <i class="fa fa-camera-retro"></i>
                        
                    </form> -->
                    <!-- <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                    </div> -->
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        // (function () {
        // 'use strict'

        // // Fetch all the forms we want to apply custom Bootstrap validation styles to
        // var forms = document.querySelectorAll('.needs-validation')

        // // Loop over them and prevent submission
        // Array.prototype.slice.call(forms)
        //     .forEach(function (form) {
        //     form.addEventListener('submit', function (event) {
        //         if (!form.checkValidity()) {
        //         event.preventDefault()
        //         event.stopPropagation()
        //         }

        //         form.classList.add('was-validated')
        //     }, false)
        //     })
        // })()

        // Disable form submissions if there are invalid fields
        // (function() {
        // 'use strict';
        // window.addEventListener('load', function() {
        //     // Get the forms we want to add validation styles to
        //     var forms = document.getElementsByClassName('needs-validation');
        //     // Loop over them and prevent submission
        //     var validation = Array.prototype.filter.call(forms, function(form) {
        //     form.addEventListener('submit', function(event) {
        //         if (form.checkValidity() === false) {
        //             event.preventDefault();
        //             event.stopPropagation();
        //         }
        //         form.classList.add('was-validated');
        //     }, false);
        //     });
        // }, false);
        // })();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{secure_asset('assets/user/js/main.min.js')}}"></script>
    <script src="{{secure_asset('assets/user/js/script.js')}}"></script>
</body>
</html>

@endsection