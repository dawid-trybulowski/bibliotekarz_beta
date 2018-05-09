<?php

namespace App\Http\Services\Admin;

use App\Http\Entities\CategoryEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Content\CategoriesService;
use App\Models\Book;
use App\Models\Categories;

class AdminCategoryService extends CategoriesService
{
    /**
     * @var Book
     */
    private $books;

    public function __construct(Categories $categories, Book $books)
    {
        parent::__construct($categories);
        $this->categories = $categories;
        $this->books = $books;
    }

    public function getAllCategories($request)
    {
        if ($request->searchBy) {
            return $this->categories->searchByAndSortBy($request);
        }
        return $this->categories->getAllCategories();
    }

    public function editCategory($request)
    {
        $categoryEntity = $this->createCategoryEntity((int)$request->id, $request->name);
        $result = $this->categories->editCategory($categoryEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function createCategoryEntity($id = null, $name)
    {
        $categoryEntity = new CategoryEntity();
        $categoryEntity->setName($name);
        $categoryEntity->setId($id);
        return $categoryEntity;
    }

    public function getCategoryById($categoryId)
    {
        return $this->categories->getCategoryById($categoryId);
    }

    public function addCategory($request)
    {
        $categoryEntity = $this->createCategoryEntity(null, $request->name);
        $result = $this->categories->addCategory($categoryEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. Id nowej kategorii: ' . $result, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function deleteCategory($categoryId)
    {
        $dependencies = $this->checkCategoryDependencies($categoryId);
        foreach ($dependencies as $dependency) {
            if ($dependency['dependencies']) {
                $message = new Message(__('view.Błąd'), 'Nie możesz usunąć kategorii przypisanej do ' . $dependency['string'], 409, false);
                return $message;
            }
        }
        $result = $this->categories->deleteCategory($categoryId);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    private function checkCategoryDependencies($categoryId)
    {
        $dependencies = [];
        $books = $this->books
            ->where
            (
                'category_id', (int)$categoryId
            )
            ->get();
        if (count($books)) {
            $dependencies['books'] =
                [
                    'string' => 'książki',
                    'ids' => [],
                    'dependencies' => true
                ];
            foreach ($books as $book) {
                array_push($dependencies['books']['ids'], $book->id);
            }
        } else {
            $dependencies['books'] =
                [
                    'string' => 'Książki',
                    'ids' => [],
                    'dependencies' => false
                ];
        }

        return $dependencies;
    }
}