<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
/*用户授权策略类*/
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $currentUser,User $user)
    {
	    return $currentUser->id===$user->id;
    }
    public function destroy(User $currentUser,User $user)
    {
	    //只有当前d用户拥有管理员权限且删除的用户不是自己时才显示链接。
	    return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
