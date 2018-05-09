<?php

namespace App\Http\Services\Admin;


use App\Models\Borrows;
use App\Models\Reservations;
use App\Models\User;

class StatisticsService
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Reservations
     */
    private $reservations;
    /**
     * @var Borrows
     */
    private $borrows;

    public function __construct
    (
        User $user,
        Reservations $reservations,
        Borrows $borrows
    )
    {
        $this->user = $user;
        $this->reservations = $reservations;
        $this->borrows = $borrows;
    }

    public function getStatistics()
    {

        $date = (date('Y-m-d'));

        $users = $this->user->get();

        $reservations = $this->reservations->get();

        $borrows = $this->borrows->get();

        $usersAll = count($users);

        $userToday = 0;

        $usersWeek = 0;

        $usersMonth = 0;

        $reservationsAll = count($reservations);

        $reservationsToday = 0;

        $reservationsWeek = 0;

        $reservationsMonth = 0;

        $borrowsAll = count($reservations);

        $borrowsToday = 0;

        $borrowsWeek = 0;

        $borrowsMonth = 0;

        $month = date('m');

        $week = date('w');

        $week_start = date('Y-m-d', strtotime('-' . $week . ' days'));

        foreach ($users as $user) {
            if (preg_match('/2018-' . $month . '/', $user['created_at']->toDateTimeString())) {
                $usersMonth += 1;
                for ($c = 1; $c < 7; $c++) {
                    if (preg_match('/' . date('Y-m-d', strtotime($week_start . ' + ' . $c . ' days')) . '/', $user['created_at']->toDateTimeString())) {
                        $usersWeek++;
                    }
                }
                if (preg_match('/' . $date . '/', $user['created_at']->toDateTimeString())) {
                    $userToday++;
                }
            }
        }

        foreach ($reservations as $reservation) {
            if (preg_match('/2018-' . $month . '/', $reservation['reservation_date_start'])) {
                $reservationsMonth += 1;
                for ($c = 1; $c < 7; $c++) {
                    if (preg_match('/' . date('Y-m-d', strtotime($week_start . ' + ' . $c . ' days')) . '/', $reservation['reservation_date_start'])) {
                        $reservationsWeek++;
                    }
                }
                if (preg_match('/' . $date . '/', $reservation['reservation_date_start'])) {
                    $reservationsToday++;
                }
            }
        }

        foreach ($borrows as $borrow) {
            if (preg_match('/2018-' . $month . '/', $borrow['borrow_start'])) {
                $borrowsMonth += 1;
                for ($c = 1; $c < 7; $c++) {
                    if (preg_match('/' . date('Y-m-d', strtotime($week_start . ' + ' . $c . ' days')) . '/', $borrow['borrow_start'])) {
                        $borrowsWeek++;
                    }
                }
                if (preg_match('/' . $date . '/', $borrow['borrow_start'])) {
                    $borrowsToday++;
                }
            }
        }

        $date =
            [
                'users' =>
                    [
                        'all' => $usersAll,
                        'today' => $userToday,
                        'week' => $usersWeek,
                        'month' => $usersMonth
                    ],

                'reservations' =>
                    [
                        'all' => $reservationsAll,
                        'today' => $reservationsToday,
                        'week' => $reservationsWeek,
                        'month' => $reservationsMonth
                    ],

                'borrows' =>
                    [
                        'all' => $borrowsAll,
                        'today' => $borrowsToday,
                        'week' => $borrowsWeek,
                        'month' => $borrowsMonth
                    ],

            ];
        return $date;
    }
}