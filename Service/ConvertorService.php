<?php
namespace BestModules\CloudConvertBundle\Service;

use Symfony\Component\HttpFoundation\File\File;
use \BestModules\CloudConvertBundle\CloudConvert;

class ConvertorService 
{
    /**
     * @var string
     */
    protected $apiKey;

    public function __construct($apiKey) 
    {
        $this->apiKey = $apiKey;
    }
    
    public function convertFile($filepath, $outputFormat)
    {
        $pathinfo = pathinfo($filepath);
        $process = CloudConvert::createProcess($pathinfo['extension'], $outputFormat, $this->apiKey);
        $process->upload($filepath, $outputFormat);
        
//        $process = CloudConvert::useProcess('https://l4.cloudconvert.com/process/Pr79KlxO1AwoByCQEF3b');
        
        if ($process->waitForConversion()) {
            return $process->getFiles();
        }
    }
}
