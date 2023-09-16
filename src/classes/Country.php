<?php
class Country {
    public function __construct(
        private $name,
        private $timezone
    ) {}

    public function getName() {
        return $this->name;
    }

    public function getTimezone() {
        return $this->timezone;
    }
}
?>
