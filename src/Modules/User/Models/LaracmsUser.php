<?php

namespace Grundmanis\Laracms\Modules\User\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LaracmsUser extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
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
     * @param string $unique
     * @param $request
     * @return string
     */
    public function uploadAvatar(string $unique, $request)
    {
        $folderName = 'laracms_avatars';
        $public = 'public';
        $avatarName = $unique . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

        try {
            $request
                ->file('avatar')
                ->storeAs($public . '/' . $folderName, $avatarName);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
        }

        return $folderName . '/' . $avatarName;
    }

    public function deleteAvatar()
    {
        if ($this->avatar && Storage::exists('public/' . $this->avatar)) {
            try {
                Storage::delete('public/' . $this->avatar);
            } catch (\Exception $exception) {
                Log::info($exception->getMessage());
            }
        }
    }
}
