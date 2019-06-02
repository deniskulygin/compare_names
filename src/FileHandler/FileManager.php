<?php

namespace src\FileHandler;

use src\FileHandler\Services\TxtService;
use src\FileHandler\Services\FileServiceInterface;
use src\Logger\FileLogger;


Class FileManager
{
    /** @var string */
    private $filePath;

    /**
     * FileManager constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath = null)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getFileExtension(): string
    {
        try {
            if(isset($this->filePath))
            {
                $extension = new \SplFileInfo($this->filePath);
                return ucfirst($extension->getExtension());
            }
            throw new \Exception("Filepath for FileManager wasn`t set");
        }
        catch(\Exception $e)
        {
            $logger = new FileLogger;
            $logger->writeLog($e->getMessage());
            echo "<h1>".$e->getMessage()."</h1>";
        }
    }

    /**
     * @param string $fileExt
     * @return object
     * throws \RuntimeException
     */

    private function getFileHandler(string $fileExt): object
    {
        $className = 'src\FileHandler\Services\\' . $fileExt . 'Service';
            if (class_exists($className)) {
                return new $className;
            }
            throw new \RuntimeException("Class {$className} isn't exist");

    }


    /**
     * @return array
     * @throws \RuntimeException
     */
    public function getFileContent(): array
    {
        $handler = $this->getFileHandler($this->getFileExtension());

            if (isset($this->filePath)) {
                return $handler->getData($this->filePath);
            }

            throw new \RuntimeException("Filepath for FileContent wasn`t set");

    }
}