<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'login', 'first_name', 'second_name', 'surname', 'city', 'street', 'house_number', 'apartment_number', 'post_code', 'birth_date', 'card_number', 'verified', 'status', 'permissions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateUserDebt($userId, $debt)
    {
        return $this
            ->where('id', $userId)
            ->update
            (
                ['debt' => $debt]
            );
    }

    public function getAllUsers()
    {
        return $this
            ->whereIn('permissions', [1])
            ->paginate(20);
    }

    public function changeStatus($userId, $status)
    {
       return $this
            ->where('id', (int)$userId)
            ->update
            (
                [
                    'status' => (int)$status
                ]
            );
    }

    public function getUserById($userId)
    {
        return $this
            ->where('id', (int)$userId)
            ->get()
            ->first();
    }

    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if ($searchBy !== 'id' && $searchBy !== 'card_number') {
            $users = $this
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->whereIn('permissions', [2,3])
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $users = $this
                ->where($searchBy, (int)$text)
                ->whereIn('permissions', [2,3])
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $users;
    }

    public function getAllPermittedUsers()
    {
        return $this
            ->whereIn('permissions', [2,3])
            ->paginate(20);
    }
}
