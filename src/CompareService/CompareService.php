<?php

namespace src\CompareService;

Class CompareService
{
    public function __construct()
    {
        $this->setPercent();
    }

    /**
     * @var array
     */
    public $compareResult = [];

    /**
     * @var integer
     */
    public $percent;


    /**
     * @param $namesFolder
     * @param $namesList
     * @return void
     */
    public function Compare($namesFolder, $namesList): void
    {
        foreach ($namesFolder as $pathFromFolder) {
            foreach ($namesList as $nameFromList) {
                    if ( levenshtein(basename($pathFromFolder), $nameFromList) > intval($this->percent)) {
                        $this->compareResult[] = $pathFromFolder;
                        break;
                }
            }

        }
    }

    /**
     * @return void
     */
    public function setPercent(): void
    {
        $this->percent = getenv('percent');
    }
}
