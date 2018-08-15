<?php

namespace App\Services\Production;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use DB;
use Excel;

class UserService extends BaseService implements UserServiceInterface
{
    /**
     * Create new user
     *
     * @param array $inputs
     * @return User
     * @throws \Exception
     */
    public function createUser(array $inputs)
    {
        if (!empty($inputs['iso_time'])) {
            $inputs['birthday']    = handling_date($inputs['birthday']);
            $inputs['birthday_jp'] = $inputs['birthday'] ? convert_japan_date($inputs['birthday'], true) : null;
        } else {
            $inputs['birthday_jp'] = handling_date($inputs['birthday_jp']);
            $inputs['birthday']    = $inputs['birthday_jp'] ? convert_japan_date($inputs['birthday_jp'], false) : null;
        }

        return User::create($inputs);
    }

    /*

     * Delete User Data
     *
     * @param User $user
     *
     * @return Bool
     */
    public function deleteUser(User $user)
    {
        return $user->delete();
    }

    /* Update User Data
    *
    * @param array $input
    * @param User $user
    * @return User
    */
    public function updateUser(User $user, array $inputs)
    {
        if (!empty($inputs['iso_time'])) {
            $inputs['birthday']    = handling_date($inputs['birthday']);
            $inputs['birthday_jp'] = $inputs['birthday'] ? convert_japan_date($inputs['birthday'], true) : null;
        } else {
            $inputs['birthday_jp'] = handling_date($inputs['birthday_jp']);
            $inputs['birthday']    = $inputs['birthday_jp'] ? convert_japan_date($inputs['birthday_jp'], false) : null;
        }

        if (!\Auth::user()->isFullAdmin() && !empty($inputs['role'])) {
            unset($inputs['role']);
        }

        if (\Auth::user()->isFullAdmin()) {

            if (!empty($inputs['office_responsibility'])) {
                $inputs['office_responsibility'] = 1;
            } else {
                $inputs['office_responsibility'] = 0;
            }

            if (!empty($inputs['contact_responsibility'])) {
                $inputs['contact_responsibility'] = 1;
            } else {
                $inputs['contact_responsibility'] = 0;
            }
        }

        return $user->update($inputs);
    }

    /**
     * filter users
     *
     * @param array $param
     * @return $users
     * */
    public function searchUser(array $param)
    {
        $users = User::query()->with([
            'company',
            'factory',
            'position'
        ]);

        if (!empty($param['keyword'])) {
            $users->filter($param['keyword']);
        }

        if (!empty($param['role'])) {
            $users->where('role', $param['role']);
        }

        if (!empty($param['company_id'])) {
            $users->where('company_id', $param['company_id']);
        }

        if (!empty($param['factory_id'])) {
            $users->where('factory_id', $param['factory_id']);
        }

        return $users->orderBy('order', 'ASC')->paginate(config('constants.per_page'));
    }

    /**
     * Change password
     *
     * @param User $user
     * @param string $new_password
     * @return User
     */
    public function changePassword(User $user, array $input)
    {
        if (!\Hash::check($input['old_password'], $user->password)) {
            return false;
        }

        $user->update(['password' => $input['password']]);

        return $user;
    }

    /**
     * Make the excel file contains the listing of users
     *
     */
    public function makeExcel()
    {
        $users = User::select([
            'fullname', 'username', 'role',
            'email', 'phone', 'birthday_jp',
            'company_id', 'factory_id',
            'contact_responsibility','office_responsibility',
        ])
            ->with(['company', 'factory'])
            ->get();

        $data = [];

        foreach ($users as $user) {
            array_push($data, [
                trans('user.fullname') => $user->fullname,
                trans('user.username') => $user->username,
                trans('user.role') => User::roles()[$user->role],
                trans('user.email') => $user->email,
                trans('user.phone') => $user->phone,
                trans('user.birthday') => $user->birthday_jp,
                trans('user.company') => isset($user->company) ? $user->company->name : '',
                trans('user.factory') => isset($user->factory) ? $user->factory->name : '',
                trans('user.contact_responsibility') => !empty($user->contact_responsibility) ? 'o' : 'x',
                trans('user.office_responsibility') => !empty($user->office_responsibility) ? 'o' : 'x',
            ]);
        }

        $fileName = trans('user.users');
        if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
            $fileName = mb_convert_encoding($fileName, "SJIS", "UTF-8");
        }
        return Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        });
    }

}
