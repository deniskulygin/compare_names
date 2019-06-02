<?php

namespace Output;

Class OutputLogFile
{
    /**
     * @var string
     */
    private $logFile;

    public function __construct($logFilePath)
    {
        $this->logFile = $logFilePath;
    }

    /**
     * @return void
     */
    public function displayLogs(): void
    {
        try {
            if(file_exists($this->logFile)) {
                $logFileLines = file($this->logFile, FILE_IGNORE_NEW_LINES);
            } else {
                throw new \Exception("Log file isn`t exist");
            }
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
        echo "<html>";
        echo "<body>";
        echo "<h1>" . 'Log File' . "</h1>";
        echo "<table>";
        echo "<tr>";
        foreach ($logFileLines as $log) {
            echo "<td>" . $log . "</tr>\n";
        }
        echo "</tr>";
        echo "</table>";
        echo "</body>";
        echo "</html>";

    }
}
