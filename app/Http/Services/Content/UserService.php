<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 10.03.2018
 * Time: 16:39
 */

namespace App\Http\Services\Content;


use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Hash;

class UserService
{

    /**
     * @var User
     */
    protected $user;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;

    protected $config;

    public function __construct
    (
        User $user,
        Config $configAll,
        ConfigService $configService
    )
    {
        $this->user = $user;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function UserDataLoginEdit($userId, $login, $password)
    {
        try {
            $this->user
                ->where('id', $userId)
                ->update(
                    [
                        'login' => $login,
                        'password' => Hash::make($password)
                    ]);
            $message = [
                'title' => __('W porządku!'),
                'content' => __('Operacja zakonczona sukcesem'),
                'code' => 200
            ];
        } catch (Exception $e) {
            $message = [
                'title' => __('Błąd'),
                'content' => __('Wystąpił błąd podczas zapisu danych'),
                'code' => $e->getCode()
            ];
        }

        return $message;
    }

    public function userDataPersonalEdit($userId, $email, $firstName, $secondName, $surname, $city, $street, $houseNumber, $apartmentNumber, $postCode, $birthDate, $cardId)
    {
        try {
            $this->user
                ->where('id', $userId)
                ->update(
                    [
                        'email' => $email,
                        'first_name' => $firstName,
                        'second_name' => $secondName,
                        'surname' => $surname,
                        'city' => $city,
                        'house_number' => $houseNumber,
                        'apartment_number' => $apartmentNumber,
                        'post_code' => $postCode,
                        'birth_date' => $birthDate,
                        'card_number' => $cardId,
                        'street' => $street
                    ]
                );
            $message = [
                'title' => __('W porządku!'),
                'content' => __('Operacja zakonczona sukcesem'),
                'code' => 200
            ];
        } catch (Exception $e) {
            $message = [
                'title' => __('Błąd'),
                'content' => __('Wystąpił błąd podczas zapisu danych'),
                'code' => $e->getCode()
            ];
        }

        return $message;
    }
}