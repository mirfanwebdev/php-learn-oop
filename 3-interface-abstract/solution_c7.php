<?php

interface Logger
{
    public function logInfo(string $message): void;
    public function logWarning(string $message): void;
    public function logError(string $message): void;
}

class FileLogger implements Logger
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    public function writeLog(string $level, string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$level] $message" . PHP_EOL;
        file_put_contents(
            $this->filePath,
            $logEntry,
            FILE_APPEND | LOCK_EX
        );
    }

    public function logInfo(string $message): void
    {
        $this->writeLog('INFO', $message);
    }

    public function logWarning(string $message): void
    {
        $this->writeLog('WARNING', $message);
    }

    public function logError(string $message): void
    {
        $this->writeLog('ERROR', $message);
    }
}

class DatabaseLogger implements Logger
{
    // private PDO $dbConnection;

    public function __construct(/* PDO $dbConnection */)
    {
        // $this->dbConnection = $dbConnection;
        echo "(DatabaseLogger initialized, awaiting log entries)"
            . PHP_EOL;
    }

    public function writeLog(string $level, string $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        echo "DB_LOG: Inserted ['level' => '$level', 'message' => '$message', 'timestamp' => '$timestamp']" . PHP_EOL;
        // $stmt = $this->dbConnection->prepare(
        //     "INSERT INTO logs (level, message, timestamp) VALUES (?, ?, ?)");
        // $stmt->execute([$level, $message, $timestamp]);
    }
    public function logInfo(string $message): void
    {
        $this->writeLog('INFO', $message);
    }

    public function logWarning(string $message): void
    {
        $this->writeLog('WARNING', $message);
    }

    public function logError(string $message): void
    {
        $this->writeLog('ERROR', $message);
    }
}

class ConsoleLogger implements Logger
{
    public function logInfo(string $message): void
    {
        echo "[INFO] $message" . PHP_EOL;
    }

    public function logWarning(string $message): void
    {
        echo "[WARNING] $message" . PHP_EOL;
    }

    public function logError(string $message): void
    {
        echo "[ERROR] $message" . PHP_EOL;
    }
}

class Reporter
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function generateReport(): void
    {
        $this->logger->logInfo('Generating report...');

        $this->logger->logInfo("Fetching data from source A");
        if (rand(0, 1) === 0) {
            $this->logger->logWarning("Some data from source A was incomplete");
        }

        $this->logger->logInfo("Processing data for analysis");
        if (rand(0, 5) === 0) {
            $errMessage = "Critical error during data aggregation" .
                " Report may be innacurate.";
            $this->logger->logError($errMessage);
            throw new Exception("Report generation failed due to aggregation error");
        }

        $this->logger->logInfo("Formatting report for output.");
        $this->logger->logInfo("Report generated successfully.");
    }
}

echo "--- Logger System Example ---" . PHP_EOL;

echo "\n--- Using FileLogger ---" . PHP_EOL;
$fileLogger = new FileLogger(__DIR__ . '/app_logs.log');
$fileReporter = new Reporter($fileLogger);
try {
    $fileReporter->generateReport();
} catch (Exception $e) {
    echo "Caught exception during file report generation: " .
        $e->getMessage() . PHP_EOL;
}
echo "\n--- Using ConsoleLogger ---" . PHP_EOL;
$consoleLogger = new ConsoleLogger();
$consoleReporter = new Reporter($consoleLogger);
try {
    $consoleReporter->generateReport();
} catch (Exception $e) {
    echo "Caught exception during console report generation: " .
        $e->getMessage() . PHP_EOL;
}

echo "\n--- Using DatabaseLogger ---" . PHP_EOL;
$dbLogger = new DatabaseLogger();
$dbReporter = new Reporter($dbLogger);
try {
    $dbReporter->generateReport();
} catch (Exception $e) {
    echo "Caught exception during database report generation: " .
        $e->getMessage() . PHP_EOL;
}
echo PHP_EOL;
