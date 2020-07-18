@auth
<div class="modal fade" id="editPersonalTeacherModal" tabindex="-1" role="dialog" aria-labelledby="editPersonalTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-md-n3 modal-md mt-5" style="background-image: url(/media/silouhette.jpg) !important; position: relative;top: 50px; width: 100%; background-position: -200px -400px; padding: 0px;">
        <div class="bg-linear-official-50 modal-content" style="border-style: solid; border-radius: 0;">
            <span class="d-inline-block py-2 px-3 align-self-end modalCloser" id="closeEditPersonalTeacherModal" style="">x</span>
            <div class="modal-header d-flex justify-content-between p-0 pl-2 m-0">
                <h4 class="modal-title w-75 mb-0 mx-auto" id="adminModalLabel">Edition des informations de l'enseignant</h4>
            </div>
            <div class="modal-body w-100">

                <form id="formEditPersonalTeacher" class="form-horizontal opac-form" role="form" method="put" action="">
                    {!! csrf_field() !!}
                    @method('PUT')

                    <div class="w-100 mx-auto">
                        <input type="text" name="editor" value="{{auth()->user()->name}}" hidden="">
                        <input type="text" name="authorized" value="{{\App\Http\Controllers\Master\SuperAdminController::getAuthorization(auth()->user())}}" hidden="">
                        <input type="text" name="teacher_id" hidden="">
                        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                            <div class="" style="width: 100%">
                                <label for="ed_name" class="m-0 p-0">Nom et Prénoms de l'enseignant</label>
                                <input type="text" class="form-control w-100"  name="name" id="ed_name" placeholder="Veuillez renseigner les nom et prenoms">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="mx-auto mt-2 d-flex justify-content-around" style="width: 85%">
                            <div style="width: 37%;" class="">
                                <label for="ed_subject_id" class="m-0 p-0">Spécialité</label>
                                <select name="subject_id" id="ed_subject_id" class="custom-select">
                                    <option value="">Choisir la spécialité</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>
                                <small class="help-block m-0 p-0"></small>
                            </div>
                            <div style="width: 23%;" class="">
                                <label for="ed_classe" class="m-0 p-0">Classe</label>
                                <select name="classe" id="ed_classe" class="custom-select">
                                    <option value="">Choisir la classe</option>
                                    @foreach($classes as $c)
                                        <option value="{{$c->id}}" @if($c->teachers->toArray() !== []) disabled="" @endif >{{$c->name}}</option>
                                    @endforeach
                                </select>
                                <small class="help-block"></small>
                            </div>
                            <div style="width: 37%;" class="">
                                <label for="ed_role" class="m-0 p-0">Role</label>
                                <select name="role" id="ed_role" class="custom-select">
                                    <option value="">Choisir le rôle</option>
                                    @foreach($roles as $r => $value)
                                        <option value="{{$r}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                            <div class="mx-auto" style="width: 48.8%;">
                                <label for="ed_email" class="m-0 p-0">E-mail de l'enseignant</label>
                                <input type="email" class="m-0 p-0 form-control p-1 " name="email" id="ed_email" placeholder="Veuillez renseigner l'addresse mail">
                                <small class="help-block"></small>
                            </div>
                            <div class="mx-auto" style="width: 48.8%;">
                                <label for="ed_birth" class="m-0 p-0">Date de naissance de l'enseignant</label>
                                <input type="date" class="m-0 p-0 form-control p-1" name="birth" id="ed_birth" placeholder="Veuillez renseigner la date de naissance">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class="mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                            <div class="mx-auto" style="width: 48.8%;">
                                <label for="ed_contact" class="m-0 p-0">Contacts de l'enseignant</label>
                                <input type="text" class="m-0 p-0 form-control p-1" name="contact" id="ed_contact" placeholder="Veuillez renseigner les contacts les séparer avec un '/'">
                                <small class="help-block"></small>
                            </div>
                            <div class="mx-auto" style="width: 48.8%;">
                                <label for="ed_residence" class="m-0 p-0">Résidence de l'enseignant</label>
                                <input type="text" class="m-0 p-0 form-control p-1" name="residence" id="ed_residence" placeholder="Veuillez renseigner la résidence exemple 'Porto-Novo'">
                                <small class="help-block"></small>
                            </div>
                        </div>
                        <div class=" mx-auto mt-2 d-flex justify-content-between" style="width: 85%">
                            <div style="width: 31%;" class="">
                                <label for="ed_sexe" class="m-0 p-0">Sexe</label>
                                <select name="sexe" id="ed_sexe" class="custom-select">
                                    <option value="">Choisir le sexe</option>
                                    <option value="male">Masculin</option>
                                    <option value="female">Féminin</option>
                                </select>
                                <small class="help-block"></small>
                            </div>
                            
                            <div style="width: 31%;">
                                <label for="ed_month" class="m-0 p-0">Le mois d'inscription</label>
                                <select name="month" id="ed_month" class="custom-select">
                                    <option value="">Choisissez le mois</option>
                                    @foreach($months as $m => $value)
                                        <option value="{{$value}}" @if($m == date('m') -1 ) selected="" @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div style="width: 31%;">
                                <label for="ed_year" class="mb-0">L'année d'inscription</label>
                                <select name="year" id="ed_year" class="custom-select">
                                    <option value="">Choisissez l'année</option>
                                    @for($i = 1990; $i <= date('Y'); $i++)
                                        <option value="{{$i}}" @if($i == date('Y')) selected="" @endif>{{$i}}</option>
                                    @endfor
                                </select>
                                <small class="help-block"></small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-50 mx-auto py-1 mt-2">
                        <button class="btn bg-linear-official-50 w-50" type="submit">Mettre à jour</button>
                    </div>
                </form>                       
            </div>
        </div>
    </div>
</div>
@endauth