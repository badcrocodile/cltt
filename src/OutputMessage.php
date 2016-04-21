<?php namespace Acme;


class OutputMessage {
    /**
     * OutputMessage constructor.
     * @param $message
     */
    public function __construct($message) {
        $this->message = $message;
    }

    public function asComment() {
        return "<comment>" . $this->message . "</comment>";
    }

    public function asInfo() {
        return "<info>" . $this->message . "</info>";
    }

    public function asQuestin() {
        return "<question>" . $this->message . "</question>";
    }

    public function asError() {
        return "<error>" . $this->message . "</error>";
    }
}