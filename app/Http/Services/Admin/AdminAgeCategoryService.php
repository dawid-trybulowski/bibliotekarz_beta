<?php


namespace App\Http\Services\Admin;


use App\Http\Entities\AgeCategoryEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Content\AgeCategoriesService;
use App\Models\AgeCategories;
use App\Models\Book;

class AdminAgeCategoryService extends AgeCategoriesService
{
    /**
     * @var Book
     */
    private $books;

    public function __construct(AgeCategories $ageCategories, Book $books)
    {
        parent::__construct($ageCategories);
        $this->books = $books;
    }

    public function getAllAgeCategories($request)
    {
        if($request->searchBy){
            return $this->ageCategories->searchByAndSortBy($request);
        }
        return $this->ageCategories->getAllAgeCategories();
    }

    public function getAgeCategoryById($ageCategoryId)
    {
        return $this->ageCategories->getAgeCategoryById($ageCategoryId);
    }

    public function editAgeCategory($request)
    {
        $categoryEntity = $this->createAgeCategoryEntity((int)$request->id, $request->name, $request->minAge, $request->maxAge);
        $result = $this->ageCategories->editCategory($categoryEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function createAgeCategoryEntity($id = null, $name, $minAge, $maxAge)
    {
        $categoryEntity = new AgeCategoryEntity();
        $categoryEntity->setName($name);
        $categoryEntity->setMinAge($minAge);
        $categoryEntity->setMaxAge($maxAge);
        $categoryEntity->setId($id);
        return $categoryEntity;
    }

    public function addAgeCategory($request)
    {
        $categoryEntity = $this->createAgeCategoryEntity(null, $request->name, $request->minAge, $request->maxAge);
        $result = $this->ageCategories->addAgeCategory($categoryEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'). '. Id nowej kategorii: ' . $result, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function deleteCategory($ageCategoryId)
    {
        $dependencies = $this->checkAgeCategoryDependencies($ageCategoryId);
        foreach ($dependencies as $dependency) {
            if ($dependency['dependencies']) {
                $message = new Message(__('view.Błąd'), 'Nie możesz usunąć kategorii wiekowej przypisanej do ' . $dependency['string'], 409, false);
                return $message;
            }
        }
        $result = $this->ageCategories->deleteAgeCategory($ageCategoryId);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    private function checkAgeCategoryDependencies($ageCategoryId)
    {
        $dependencies = [];
        $books = $this->books
            ->where
            (
                'age_category_id', (int)$ageCategoryId
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