<?php
error_reporting(0);
class XmlValidator
{
    /**
     * @var string
     */
    protected $feedSchema = __DIR__  .  '/schema.xsd';
    /**
     * @var int
     */
    public $feedErrors = 0;
    /**
     * Formatted libxml Error details
     *
     * @var array
     */
    public $errorDetails;
    /**
     * Validation Class constructor Instantiating DOMDocument
     *
     * @param \DOMDocument $handler [description]
     */
    public function __construct()
    {
        $this->handler = new \XMLReader();
    }
    /**
     * @param \libXMLError object $error
     *
     * @return string
     */
    private function libxmlDisplayError($error)
    {
        $errorString = "Error $error->code in $error->file (Line:{$error->line}):";
        $errorString .= trim($error->message);
        return $errorString;
    }
    /**
     * @return array
     */
    private function libxmlDisplayErrors()
    {
        $errors = libxml_get_errors();
        $result    = [];
        foreach ($errors as $error) {
            $result[] = $this->libxmlDisplayError($error);
        }
        libxml_clear_errors();
        return $result;
    }
    /**
     * Validate Incoming Feeds against Listing Schema
     *
     * @param resource $feeds
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function validateFeeds($feeds)
    {
        if (!class_exists('XMLReader')) {
            throw new \DOMException("'XMLReader' class not found!");
            return false;
        }
        
        if (!file_exists($this->feedSchema)) {
            throw new \Exception('Schema is Missing, Please add schema to feedSchema property');
            return false;
        }
        
        // $isthere = $this->handler->open('/var/www/wp_questionnaire/htdocs/wp-content/plugins/questform/xml/tmp.xml');
        $this->handler->xml($feeds);
        $this->handler->setSchema($this->feedSchema);
        // $stringtest = $this->handler->readstring();
        // $stringtestread = $this->handler->read();
        // $isValid = $this->handler->isValid();
        libxml_use_internal_errors(true);
        while($this->handler->read()) {
            $name = $this->handler->name;
            if (!$this->handler->isValid()) {
                $this->errorDetails = $this->libxmlDisplayErrors();
                $this->feedErrors = 1;
                break;
            }
        };
        $this->handler->close();
        if ($this->feedErrors !== 0) {
            // var_dump($this->displayErrors());
            return false;
        } else {
            return true;
        }
    }
    /**
     * Display Error if Resource is not validated
     *
     * @return array
     */
    public function displayErrors()
    {
        return $this->errorDetails;
    }
}