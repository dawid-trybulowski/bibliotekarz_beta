<?php

namespace App\Models;

use App\Http\Entities\PaymentEntity;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    public function addPayment(PaymentEntity $paymentEntity){
       return $this
            ->insert(
                [
                    'user_id' => $paymentEntity->getUserId(),
                    'amount' => $paymentEntity->getAmount(),
                    'method' => $paymentEntity->getMethod(),
                    'session_id' => $paymentEntity->getSessionId(),
                    'status' => $paymentEntity->getStatus()
                ]
            );
    }

    public function getPaymentDataBySessionId($sessionId){
        return $this
            ->where('session_id', $sessionId)
            ->get()
            ->first();
    }

    public function updatePaymentStatus($id, $status){
        $this
            ->where('id', (int)$id)
            ->update
            (
                ['status' => (int) $status]
            );

    }

    public function getAllPayments(){
        return $this
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->select('payments.*', 'users.first_name', 'users.surname', 'users.card_number')
            ->paginate(20);
    }

    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if ($searchBy !== 'reservations.id') {
            $payments = $this
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->select('payments.*', 'users.first_name', 'users.surname', 'users.card_number')
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $payments = $this
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->select('payments.*', 'users.first_name', 'users.surname', 'users.card_number')
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $payments;
    }
}
