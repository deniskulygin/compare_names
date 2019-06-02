<?php

namespace src\Logger;

use src\FileSystem\FileSystemService;

Class FileLogger
{
    /** @var string */
    private $folder;

    public function __construct()
    {
        $fileSystemService = new FileSystemService;
        $fileSystemService->createLogDirectory();
        $this->folder = $fileSystemService->getFolder();
    }

    /**
     * @param string $message
     * @param string $errorType
     * @throws \Exception
     */
    public function log(string $message, $errorType = "INFO"): void
    {
        file_put_contents($this->folder . date('Y_m_d_H') . '.log',
  sprintf("[%s] Level: `%s`. Message: `%s`", date('Y-m-d H:i:s'),
        $errorType, $message) . PHP_EOL, FILE_APPEND);
    }
}
