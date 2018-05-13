<?php


namespace App\Mappers;

class GeneralSettingsMapper
{
    public $map =
        [
            'reservation_time' => 'reservationTime',
            'max_reservation_count' => 'maxReservationCount',
            'borrow_time' => 'borrowTime',
            'reservation_without_verification' => 'reservationWithoutVerification',
            'library_name' => 'libraryName',
            'library_phone' => 'libraryPhone',
            'library_address' => 'libraryAddress',
            'library_email' => 'libraryEmail'
        ];
}