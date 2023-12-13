<?php 

// Define a trait
trait Loggable {
    public function log($message) {
        echo "Logging: $message\n";
    }
}

trait Printable {
    public function printMessage($message) {
        echo "Printing: $message\n";
    }
}

// Use traits in a class
class MessageProcessor {
    use Loggable, Printable;

    public function process($message) {
        $this->log($message);
        $this->printMessage($message);
    }
}

// Create an instance of the class
$processor = new MessageProcessor();

// Use methods from the traits
$processor->log("This is a log message");             // Output: Logging: This is a log message
$processor->printMessage("This is a print message");   // Output: Printing: This is a print message

// Use the combined functionality
$processor->process("This is a processed message");
// Output:
// Logging: This is a processed message
// Printing: This is a processed message



?>