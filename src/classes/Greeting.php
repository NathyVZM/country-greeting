<?php
class Greeting {
    public function __construct(
        private $message,
        private $localTime
    ) {}

    public function getMessage() {
        return $this->message;
    }

    public function getLocaltime() {
        return $this->localTime->format('h:i A');
    }
}
?>

