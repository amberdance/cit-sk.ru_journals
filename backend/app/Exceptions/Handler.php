<?php

namespace App\Exceptions;

use App\Utils\ResponseEntity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\UnauthorizedException;
use PDOException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use ResponseEntity;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    /**
     * @param             $request
     * @param  Throwable  $e
     *
     * @return mixed
     * @throws Throwable
     */
    public function render($request, Throwable $e): mixed
    {
        if ($e instanceof NotFoundHttpException || $e instanceof ModelNotFoundException) {
            return $this->jsonNotFound();
        }


        if ($e instanceof UnauthorizedException) {
            return $this->jsonForbidden($e->getMessage());
        }

        if ($e instanceof PDOException) {
            $message = $e->getMessage();

            if (is_numeric(stripos($message, "Duplicate"))) {
                return $this->jsonError(1062,
                    App::environment("local") ? $e->getMessage() : preg_replace("/1062(?s)(.*) \(SQL/", "",
                        $e->getMessage()));
            }

            if (is_numeric(stripos($message, "Integrity constraint violation"))) {
                return $this->jsonError(1451,
                    App::environment("local") ? $e->getMessage() : preg_replace("/1451(?s)(.*) \(SQL/", "",
                        $e->getMessage()));
            }
        }

        return parent::render($request, $e);
    }
}
