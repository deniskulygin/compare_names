<?php

namespace src\FileSystem;

Class FileSystemService

{
    public function __construct()
    {
        $this->logFolder = __DIR__ . $this->getLogFolderPath();
    }

    /** @var string */
    private $logFolder;

    /**
     * @return string
     */
    private function getLogFolderPath(): string
    {
        return getenv('logFolderPass');
    }

    /**
     * @return void
     */
    public function createLogDirectory(): void
    {
       if (!file_exists($this->logFolder) || !is_dir($this->logFolder)) {
            mkdir($this->logFolder);
        }
    }

    /**
     * @return string
     */
    public function getFolder(): string
    {
        return $this->logFolder;
    }


}

