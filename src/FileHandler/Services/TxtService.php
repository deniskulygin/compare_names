<?php

namespace src\FileHandler\Services;

Class TxtService implements FileServiceInterface
{
    /**
     * @return array
     * @param $filePath
     */
    public function getData($filePath): array
    {
            $file = new \SplFileObject("$filePath");
        while (!$file->eof()) {
            return $file->fgetcsv(",");
        }
    }
}