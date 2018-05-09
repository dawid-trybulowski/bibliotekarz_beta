<?php

namespace App\Models;

use App\Http\Entities\CategoryEntity;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function getAllCategories()
    {
        return $this
            ->where('active', 1)
            ->paginate(20);
    }

    public function editCategory(CategoryEntity $categoryEntity)
    {
        return $this
            ->where('id', $categoryEntity->getId())
            ->update
            (
                [
                    'name' => $categoryEntity->getName()
                ]
            );
    }

    public function getCategoryById($categoryId)
    {
        return $this
            ->where('id', (int)$categoryId)
            ->get()
            ->first();
    }

    public function addCategory(CategoryEntity $categoryEntity)
    {
        return $this
            ->insertGetId
            (
                [
                    'name' => $categoryEntity->getName()
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

    public function deleteCategory($categoryId)
    {
        return $this
            ->where('id', (int)$categoryId)
            ->delete();
    }
}
