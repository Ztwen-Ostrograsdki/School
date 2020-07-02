@extends('layouts.app')

@section('content')
    @if(session()->has('info'))
      <div class="m-0 p-1 w-75 mx-auto text-center">
        <p class="alert alert-{{session('type')}} w-100">
          {{session('info')}}
        </p>
      </div>
    @endif  
<div class="container">
    <h2 style="margin-top: 10px;">Laravel 5.7 Ajax Form Submission Example</h2>
    <br>
    <br>
   
    <form id="contact_us" method="post" action="{{route('pupils.store')}}">
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>      
      <div class="form-group">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
      </div>
      <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
      </div>
      <div class="form-group">
       <button type="submit" id="send_form" class="btn btn-success">Submit</button>
      </div>
    </form>
 
</div>
@section('js')
<script>
   if ($("#contact_us").length > 0) {
    $("#contact_us").validate({
     
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
 
       mobile_number: {
            required: true,
            digits:true,
            minlength: 1,
            maxlength:5,
        },
        email: {
                required: true,
                maxlength: 50,
                email: true,
            },    
    },
    messages: {
       
      name: {
        required: "Please enter name",
        maxlength: "Your last name maxlength should be 50 characters long."
      },
      mobile_number: {
        required: "Please enter contact number",
        minlength: "The contact number should be 10 digits",
        digits: "Please enter only numbers",
        maxlength: "The contact number should be 12 digits",
      },
      email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email name should less than or equal to 50 characters",
        },
        
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: 'http://localhost/laravel-example/save-form' ,
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');

            document.getElementById("contact_us").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>
@endsection
@endsection