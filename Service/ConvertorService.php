<?php
namespace BestModules\CloudConvertBundle\Service;

use Symfony\Component\HttpFoundation\File\File;

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
    
    public function convertFile(File $file, $outputFormat)
    {
        $process = \CloudConvert::createProcess($file->getExtension(), $outputFormat);
        $process->upload($file->getPath(), $outputFormat);
        
        if ($process->waitForConversion()) {
            $process->download($target);
        }
    }
}
