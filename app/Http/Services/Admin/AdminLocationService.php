<?php


namespace App\Http\Services\Admin;


use App\Http\Entities\LocationEntity;
use App\Http\Helpers\Message;
use App\Models\location;

class AdminLocationService
{
    /**
     * @var location
     */
    private $location;

    public function __construct
    (
        location $location
    )
    {
        $this->location = $location;
    }

    public function getAllLocations($request)
    {
        if ($request->searchBy) {
            return $this->location->searchByAndSortBy($request);
        }
        return $this->location->getAllLocations();
    }

    public function editLocation($request)
    {
        $locationEntity = $this->createLocationEntity((int)$request->id, $request->name, $request->address);
        $result = $this->location->editLocation($locationEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }
    
    public function createLocationEntity($id = null, $name, $address)
    {
        $locationEntity = new LocationEntity();
        $locationEntity->setName($name);
        $locationEntity->setId($id);
        $locationEntity->setAddress($address);
        return $locationEntity;
    }

    public function getLocationById($locationId)
    {
        return $this->location->getLocationById($locationId);
    }

    public function addLocation($request)
    {
        $locationEntity = $this->createLocationEntity(null, $request->name, $request->address);
        $result = $this->location->addLocation($locationEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. Id nowej lokalizacji: ' . $result, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function deleteLocation($locationId)
    {
        $dependencies = $this->checkLocationDependencies($locationId);
        foreach ($dependencies as $dependency) {
            if ($dependency['dependencies']) {
                $message = new Message(__('view.Błąd'), 'Nie możesz usunąć kategorii przypisanej do ' . $dependency['string'], 409, false);
                return $message;
            }
        }
        $result = $this->location->deleteLocation($locationId);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    private function checkLocationDependencies($locationId)
    {
        $dependencies = [];
        $books = $this->books
            ->where
            (
                'location_id', (int)$locationId
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