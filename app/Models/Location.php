<?php

namespace App\Models;

use App\Http\Entities\LocationEntity;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function getAllLocations()
    {
        return $this
            ->paginate(20);
    }

    public function editLocation(LocationEntity $locationEntity)
    {
        return $this
            ->where('id', $locationEntity->getId())
            ->update
            (
                [
                    'name' => $locationEntity->getName(),
                    'address' => $locationEntity->getAddress(),
                ]
            );
    }

    public function getLocationById($locationId)
    {
        return $this
            ->where('id', (int)$locationId)
            ->get()
            ->first();
    }

    public function addLocation(LocationEntity $locationEntity)
    {
        return $this
            ->insertGetId
            (
                [
                    'name' => $locationEntity->getName(),
                    'address' => $locationEntity->getAddress()
                ]
            );
    }

    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if ($searchBy !== 'id') {
            $categories = $this
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $categories = $this
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $categories;
    }

    public function deleteLocation($locationId)
    {
        return $this
            ->where('id', (int)$locationId)
            ->delete();
    }
}
