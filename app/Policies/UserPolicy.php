<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user) //index
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model) // show
    {
        return ($user->id == $model->id || $user->is_admin);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user) //create e store
    {
        return $user->is_admin; // Auth::user()->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model) //edit e update
    {
        return $user->is_admin;
    }

        /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function updateOwnUser(User $user, User $model) //edit e update
    {
        return ($user->id == $model->id || $user->is_admin);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)//delete
    {
        return $user->is_admin;
    }

    public function is_admin(User $user){
        return $user->is_admin;
    }

    // Matricular-se no curso
    public function enroll(User $user)
    {
        $enroll_in_course = false;
        $courses_users = DB::table('course_user')->get(['course_id', 'user_id']);
        //dd($courses_users);
        foreach ($courses_users as $course_user)
            if($user->id == $course_user->user_id)
                $enroll_in_course = true; //dd($course_user);
        return $user->is_admin || $enroll_in_course;
    }
}
