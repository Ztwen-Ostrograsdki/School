<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-md-n3 modal-md mt-5" style="position: relative;top: 90px;">
        <div class="modal-content box-color-register-home">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Register</h4>
                <div class="w-100 d-flex justify-content-between">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
                    
                </div>
            </div>
            <div class="modal-body w-100">

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group w-100">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control w-100" name="name">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control w-100" name="email">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <label class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group w-100 mx-auto">
                        <div class="w-75 d-flex justify-content-center mx-auto">
                            <button type="submit" class="btn btn-primary w-50">
                                Register
                            </button>
                        </div>
                    </div>
                </form>                       
            </div>
        </div>
    </div>
</div>