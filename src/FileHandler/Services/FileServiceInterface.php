<?php

namespace src\FileHandler\Services;

interface FileServiceInterface
{
    /**
     * @param string $filePath
     * @return mixed
     */
    public function getData(string $filePath);
}