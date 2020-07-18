<?php

namespace App;

use App\Models\Teacher;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'creator', 'editor', 'authorized'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * To get a teacher of this user
     * @return [type] [description]
     */
    public function teachers()
    {
        return $this->morphedByMany(Teacher::class, 'userable');
    }

    public function teacher()
    {
        return $this->teachers()->get()[0];
    }


    /**
     * get all role of a user
     * @return array roles
     */
    public function getRoles()
    {
        $roles = explode('-', $this->role);
        return $roles;
    }


    /**
     * Use to return a icon of key to specify if the user is admin
     * @return [type] [description]
     */
    public function identifyAdminIcon()
    {

        $roles = $this->getRoles();

        if (in_array('admin', $roles) || in_array('superAdmin', $roles)) {
            return "fa fa-key mx-2";
        }
        return "";
    }


}
