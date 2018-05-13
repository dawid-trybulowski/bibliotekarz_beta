<?php

namespace App\Http\Services\Admin;

use App\Http\Helpers\Message;
use App\Http\Services\Content\BooksService;
use Illuminate\Http\Request;

class AdminBooksService extends BooksService
{
    public function editBook(Request $request, $photo)
    {
        $uploadOk = 0;
        if ($photo['name']) {
            $uploadOk = $this->addPhoto($photo);
        }
        if (!$uploadOk) {
            $photo = 'book.png';
        } else {
            $photo = $photo['name'];
        }

        if ($request->visible == 'on') {
            $visible = true;
        } else {
            $visible = false;
        }

        if ($this->books
            ->where('id', $request->id)
            ->update
            (
                [
                    'title' => $request->title,
                    'unified_title' => $request->unifiedTitle,
                    'author' => $request->author,
                    'subauthors' => $request->subauthors,
                    'publishing_house' => $request->publishingHouse,
                    'isbn' => $request->isbn,
                    'language' => $request->language,
                    'publication_country_code' => $request->publicationCountryCode,
                    'pages' => $request->pages,
                    'edition' => $request->edition,
                    'publication_year' => $request->publicationYear,
                    'owner' => $request->owner,
                    'location_code' => $request->locationCode,
                    'description' => $request->description,
                    'image_url' => $photo,
                    'category_id' => $request->category,
                    'age_category_id' => $request->ageCategory,
                    'visible' => $visible,
                    'binding' => $request->binding,
                    'keys' => $request->keys
                ]
            )) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function addBook($request, $photo)
    {
        $uploadOk = 0;
        if ($photo['name']) {
            $uploadOk = $this->addPhoto($photo);
        }
        if (!$uploadOk) {
            $photo = 'book.png';
        } else {
            $photo = $photo['name'];
        }

        if ($request->visible == 'on') {
            $visible = true;
        } else {
            $visible = false;
        }
        $bookId = $this->books
            ->insertGetId
            (
                [
                    'title' => $request->title,
                    'unified_title' => $request->unifiedTitle,
                    'author' => $request->author,
                    'subauthors' => $request->subauthors,
                    'publishing_house' => $request->publishingHouse,
                    'isbn' => $request->isbn,
                    'language' => $request->language,
                    'publication_country_code' => $request->publicationCountryCode,
                    'pages' => $request->pages,
                    'edition' => $request->edition,
                    'publication_year' => $request->publicationYear,
                    'owner' => $request->owner,
                    'description' => $request->description,
                    'image_url' => $photo,
                    'category_id' => $request->category,
                    'age_category_id' => $request->ageCategory,
                    'status' => 0,
                    'items' => 0,
                    'binding' => $request->binding,
                    'keys' => $request->keys,
                    'visible' => $visible
                ]
            );
        if ($bookId) {
            foreach ($request->genres as $genre) {
                $result = $this->booksHaveGenres
                    ->insert
                    (
                        [
                            'book_id' => $bookId,
                            'genre_id' => $genre
                        ]
                    );
                if (!$result) {
                    $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 409, false);
                    return $message;
                }
            }
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. ID dodanej pozycji: ' . $bookId, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function getBookById($bookId)
    {
        return $this->books->getBookById($bookId);
    }

    public function addPhoto($photo)
    {
        $target_dir = "img/";
        $target_file = $target_dir . basename($photo["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($photo["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
// Check if file already exists
//        if (file_exists($target_file)) {
//            $uploadOk = 0;
//        }
// Check file size
        if ($photo["size"] > 500000) {
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($photo["tmp_name"], $target_file)) {
                echo "The file " . basename($photo["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return $uploadOk;
    }

    public function addItemToBook($bookId)
    {
        return $this->books->addItem($bookId);
    }
}