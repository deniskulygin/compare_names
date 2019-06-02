<?php

namespace src\DirectoryHandler;

Class DirectoryIteratorService implements DirectoryInterface
{
    /** @var string */
    private $path;

    /**
     * @var array
     */
    private $folderspathslist = [];

    /**
     * @var array
     */
    private $filespathslist = [];

    /**
     * @param string $path
     */
    public function __construct(string $path = '')
    {
        $this->path = $path;
    }

    /**
     * @param string $path
     * @return DirectoryIteratorService
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getFilesPathsList(): array
    {
        if (empty($this->path)) {
            throw new \InvalidArgumentException("Path to folder hasn't been defined");
        }

        $this->iteratePath($this->path);

        return $this->filespathslist;
    }

    /**
     * @return array
     */
    public function getFoldersPathsList(): array
    {
        if (empty($this->path)) {
            throw new \InvalidArgumentException("Path to folder hasn't been defined");
        }

        $this->iteratePath($this->path);

        return $this->folderspathslist;
    }

    /**
     * @param string $path
     */
    private function iteratePath($path)
    {
        $directory = new \RecursiveDirectoryIterator($path);

        foreach ($directory as $item) {
            if ($directory == '.' || $directory == '..') {
                continue;
            }

            if ($item->isDir()) {
                $this->folderspathslist[] = $item->getRealPath();

                $this->iteratePath($item->getRealPath());

                continue;
            }

            $this->filespathslist[] = $item->getRealPath();
        }
    }
}