<?php

namespace src\DirectoryHandler;

Interface DirectoryInterface
{

//    public function getFileName(): string;
//
//    public function getFilePath(): string;
//
//    public function getFolderName(): string;
//

    /**
     * @return array
     */
    public function getFilesPathsList(): array;

    /**
     * @return array
     */
    public function getFoldersPathsList(): array;

}



