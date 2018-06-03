<?php

namespace App\Models;

use App\Http\Entities\GeneralSettingsEntity;
use App\Http\Entities\PaymentsSettingsEntity;
use App\Http\Entities\ViewSettingsEntity;
use App\Mappers\GeneralSettingsMapper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Config extends Model
{
    public $table = 'config';

    public function updateGeneralSettings(GeneralSettingsMapper $mapper, GeneralSettingsEntity $generalSettingsEntity)
    {
        $settings =
            [
                'reservation_time' => $generalSettingsEntity->getReservationTime(),
                'max_reservation_count' => $generalSettingsEntity->getMaxReservationCount(),
                'borrow_time' => $generalSettingsEntity->getReservationWithoutVerification(),
                'reservation_without_verification' => $generalSettingsEntity->getReservationWithoutVerification(),
                'library_name' => $generalSettingsEntity->getLibraryName(),
                'library_phone' => $generalSettingsEntity->getLibraryPhone(),
                'library_address' => $generalSettingsEntity->getLibraryAddress(),
                'library_email' => $generalSettingsEntity->getLibraryEmail(),
                'privacy_policy' => $generalSettingsEntity->getPrivacyPolicy(),
                'regulations' => $generalSettingsEntity->getRegulations()
            ];
        return $this->saveSettings($settings);
    }

    public function updatePaymentsSettings(PaymentsSettingsEntity $paymentsSettingsEntity)
    {
        $settings =
            [
                'payments_data' => $paymentsSettingsEntity->getPaymentData(),
                'przelewy24_status' => $paymentsSettingsEntity->getPrzelewy24Status(),
                'przelewy24_config' => $paymentsSettingsEntity->getPrzelewy24Config(),
                'charge_fee' => $paymentsSettingsEntity->getCargeFee(),
                'delay_cost' => $paymentsSettingsEntity->getDelayCost()
            ];
        return $this->saveSettings($settings);
    }

    public function updateViewSettings(ViewSettingsEntity $viewSettingsEntity)
    {
        $settings =
            [
                'books_per_page' => $viewSettingsEntity->getBooksPerPage(),
                'age_limit' => $viewSettingsEntity->getAgeLimit()
            ];
        return $this->saveSettings($settings);
    }

    public function saveSettings($settings){
        DB::beginTransaction();
        foreach ($settings as $key => $value) {
            $result = $this
                ->where('name', $key)
                ->update
                (
                    [
                        'value' => $value,
                    ]
                );
            if (!$result) {
                DB::rollback();
                return false;
            }
        }
        DB::commit();
        return true;
    }
}
