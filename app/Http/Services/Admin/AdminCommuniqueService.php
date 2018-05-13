<?php

namespace App\Http\Services\Admin;

use App\Http\Entities\CommuniqueEntity;
use App\Http\Helpers\Message;
use App\Models\Communique;

class AdminCommuniqueService
{
    /**
     * @var Communique
     */
    private $communique;

    public function __construct
    (
        Communique $communique
    )
    {

        $this->communique = $communique;
    }

    public function getAllCommuniques()
    {
        return $this->communique
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function createCommuniqueEntity($userId, $userName, $text)
    {
        $communiqueEntity = new CommuniqueEntity();
        $communiqueEntity->setUserId($userId);
        $communiqueEntity->setUserName($userName);
        $communiqueEntity->setText($text);
        return $communiqueEntity;
    }

    public function addCommunique($text, $userId, $userName)
    {
        $communiqueEntity = $this->createCommuniqueEntity($userId, $userName, $text);

        if ($this->communique->addNewCommunique($communiqueEntity)) {
            $message = new Message(__('view.W porządku!'), __('view.Komunikat dodany'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }

        return $message;
    }
}