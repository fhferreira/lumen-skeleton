<?php namespace App\Exceptions;

use App\Events\ErrorOccurred;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request $request
     * @param  Exception $e
     * @return Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e))
        {
            return $this->renderHttpException($e);
        }

        return (new SymfonyExceptionHandler(env('APP_DEBUG')))->createResponse($e);
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($this->shouldntReport($e)) return;

        event(new ErrorOccurred((string) $e));

        app('Psr\Log\LoggerInterface')->error((string) $e);
    }

    /**
     * Render the given HttpException.
     *
     * @param  HttpException $e
     * @return Response
     */
    protected function renderHttpException(HttpException $e)
    {
        $status = $e->getStatusCode();

        if (view()->exists("errors.{$status}"))
        {
            return response(view("errors.{$status}"), $status);
        }
        else
        {
            return (new SymfonyExceptionHandler(env('APP_DEBUG')))->createResponse($e);
        }
    }

    /**
     * Determine if the given exception is an HTTP exception.
     *
     * @param  Exception $e
     * @return bool
     */
    protected function isHttpException(Exception $e)
    {
        return $e instanceof HttpException;
    }

}
