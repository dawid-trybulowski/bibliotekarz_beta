<?php

namespace App\Models;

use App\Http\Entities\AgeCategoryEntity;
use Illuminate\Database\Eloquent\Model;

class AgeCategories extends Model
{
    public function getAllAgeCategories()
    {
        return $this
            ->where('active', 1)
            ->paginate(20);
    }

    public function getAgeCategoryById($ageCategoryId)
    {
        return $this
            ->where('id', $ageCategoryId)
            ->get()
            ->first();
    }

    public function editCategory(AgeCategoryEntity $ageCategoryEntity)
    {
        return $this
            ->where('id', $ageCategoryEntity->getId())
            ->update
            (
                [
                    'name' => $ageCategoryEntity->getName(),
                    'min_age' => $ageCategoryEntity->getMinAge(),
                    'max_age' => $ageCategoryEntity->getMaxAge()
                ]
            );
    }

    public function addAgeCategory(AgeCategoryEntity $ageCategoryEntity)
    {
        return $this
            ->insertGetId
            (
                [
                    'name' => $ageCategoryEntity->getName(),
                    'min_age' => $ageCategoryEntity->getMinAge(),
                    'max_age' => $ageCategoryEntity->getMaxAge()
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
            $ageCategories = $this
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $ageCategories = $this
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $ageCategories;
    }

    public function deleteAgeCategory($ageCategoryId)
    {
        return $this
            ->where('id', (int)$ageCategoryId)
            ->delete();
    }
}
