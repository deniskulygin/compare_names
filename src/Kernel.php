<?php

namespace src;

use src\FileHandler\FileManager;
use src\DirectoryHandler\DirectoryIteratorService;
use src\CompareService\CompareService;
use Dotenv;
use src\FileSystem\FileSystemService;

Class Kernel
{
    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::create('../');
        $dotenv->load();
        (new FileSystemService)->createLogDirectory();
    }

    /**
     * @param string $nameFilePath
     * @return array
     */
    public function getFileNamesList(string $nameFilePath): array
    {
        $file = new FileManager($nameFilePath);
        return $file->getFileContent();
    }

    /**
     * @param $folderPath
     * @return array
     */
    public function getRootFolderPathsList($folderPath): array
    {
        $iterator = new DirectoryIteratorService($folderPath);
        return $iterator->getFilesPathsList();

    }

    /**
     * @param $namesFolder
     * @param $namesList
     * @return array
     */
    public function Compare($namesFolder, $namesList): array
    {
        $compare = new CompareService;
        $compare->Compare($namesFolder, $namesList);
        return $compare->compareResult;
    }
}
