@auth
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-md-n3 modal-md mt-5" style="position: relative;top: 140px;">
        <div class="modal-content bg-linear-official-50" style="border-style: solid; border-radius: 0; !important;">
            <span class="d-inline-block py-2 px-3 align-self-end" id="closeCreateUserModal" style="">x</span>
            <div class="modal-header d-flex justify-content-between p-0 pl-2 m-0">
                <h4 class="modal-title w-75 mb-0" id="adminModalLabel">Création d'utilisateur</h4>
            </div>
            <div class="modal-body w-100">

                <form id="formRegisterUser" class="form-horizontal" role="form" method="POST" action="{{ route('admin.create.Defaultuser')}}">
                    @csrf

                    <div class="form-group w-100">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control w-100" name="name">
                            <small class="help-block"></small>
                        </div>
                    </div>

                    <div class="form-group w-100">
                        <div class="col-md-10 d-flex justify-content-between m-0 p-0">
                            <div class="" style="width: 69.7%;">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control w-100" name="email">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div style="width: 30%;">
                                <label class="col-md-4 control-label">Role</label>
                                <div class="col-md-12">
                                <select name="role" id="user_role" class="custom-select pb-0 mb-0">
                                    <option value="">Choisir le rôle</option>
                                    <option value="user" selected>Utilisateur</option>
                                    <option value="admin">Administrateur</option>
                                    <option value="teacher">Enseignant</option>
                                    <option value="parent">Parent</option>
                                    <option value="master">Web Master</option>
                                </select>
                                <small class="help-block"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="password" name="password" value="12345" hidden>
                    <input type="password" name="password_confirmation" value="12345" hidden>
                    <input type="text" name="creator" value="{{auth()->user()->name}}" hidden>
                    <div class="form-group w-100 mx-auto">
                        <div class="w-75 d-flex justify-content-center mx-auto">
                            <button type="submit" class="btn bg-linear-official-50 w-50">
                                Créer
                            </button>
                        </div>
                    </div>
                </form>                       
            </div>
        </div>
    </div>
</div>
@endauth