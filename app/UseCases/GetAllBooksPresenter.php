<?php


namespace App\UseCases;

use App\Responses\GetAllBooksResponse;
use function MongoDB\BSON\toJSON;

class GetAllBooksPresenter
{
    protected $reponse;

    public function __construct(
        GetAllBooksResponse $response
    )
    {
        $this->reponse = $response;
    }

    public function CreateResponse($data, $code)
    {
        if (isset($data['error'])) {
            $this->reponse->setError($data['error']);
            $this->reponse->setStatus(false);
        } else {
            $this->reponse->setBooks($data);
            $this->reponse->setStatus(true);
        }
        $this->reponse->setCode($code);
    }

    public function View()
    {
        $books = $this->reponse;

        return view('index', compact('books'));
    }
}