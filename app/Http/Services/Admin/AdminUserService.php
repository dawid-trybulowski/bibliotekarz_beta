<?php

namespace App\Http\Services\Admin;

use App\Http\Helpers\Message;
use App\Http\Services\Content\UserService;

class AdminUserService extends UserService
{
    public function getAllUsers($request)
    {
        if($request->searchBy){
            return $this->user->searchByAndSortBy($request);
        }
        return $this->user->getAllUsers();
    }

    public function changeUserAccountStatus($userId, $status)
    {
        if ($this->user->changeStatus($userId, $status)) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function getUserById($userId)
    {
        return $this->user->getUserById($userId);
    }

    public function editUser($request)
    {
        $result =
            $this->user
                ->where('id', $request->id)
                ->update(
                    [
                        'email' => $request->email,
                        'first_name' => $request->firstName,
                        'second_name' => $request->secondName,
                        'surname' => $request->surname,
                        'city' => $request->city,
                        'house_number' => $request->houseNumber,
                        'apartment_number' => $request->apartmentNumber,
                        'post_code' => $request->postCode,
                        'birth_date' => $request->birthDate,
                        'card_number' => $request->cardId,
                        'street' => $request->street,
                        'status' => $request->status,
                        'debt' => $request->debt
                    ]
                );
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function updateUserDebt($userId)
    {
        $this->user
            ->where('id', (int)$userId)
            ->increment('debt', (int)$this->config['delay_cost']);
    }

    public function getAllPermittedUsers($request)
    {
        if($request->searchBy){
            return $this->user->searchByAndSortBy($request);
        }
        return $this->user->getAllPermittedUsers();
    }

    public function editPermittedUser($request)
    {
        $result =
            $this->user
                ->where('id', $request->id)
                ->update(
                    [
                        'email' => $request->email,
                        'login' => $request->login,
                        'first_name' => $request->firstName,
                        'second_name' => $request->secondName,
                        'surname' => $request->surname,
                        'status' => $request->status,
                        'permissions' => $request->permissions
                    ]
                );
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function addPermittedUser($request)
    {
        $result =
            $this->user
                ->where('id', $request->id)
                ->insertGetId(
                    [
                        'email' => $request->email,
                        'login' => $request->login,
                        'first_name' => $request->firstName,
                        'second_name' => $request->secondName,
                        'surname' => $request->surname,
                        'status' => $request->status,
                        'permissions' => $request->permissions,
                        'password' => bcrypt($request->password)
                    ]
                );
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. ID użytkownika: ' . $result, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }
}