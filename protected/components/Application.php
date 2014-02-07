<?php
class Application extends CWebApplication {
    /**
     * @var boolean defines if the application is installed.
     */
    public $installed=false;

    /**
     * Sets flag for identifying if the application is installed.
     * @param boolean $value.
     */
    public function setInstalled($value)
    {
        $this->installed=$value;
    }

    /**
     * Returns flag for identifying if the application is installed
     * @return boolean.
     */
    public function getInstalled()
    {
        return $this->installed;
    }

    /**
     * Replies with the application install status
     * @return boolean.
     */
    public function isInstalled()
    {
        return $this->installed;
    }
} 