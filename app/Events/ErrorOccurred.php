<?php namespace App\Events;

class ErrorOccurred {

    /**
     * Occurred exception's string representation.
     *
     * @var string
     */
    public $exception;

    /**
     * Create a new event instance.
     *
     * @param string $exception
     */
    public function __construct($exception)
    {
        $this->exception = $exception;
    }

}
