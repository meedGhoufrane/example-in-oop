<?php

class BankAccount {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $initialBalance){
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }

    // Getter method for retrieving the account number
    public function getAccountNumber() {
        return $this->accountNumber;
    }

    // Getter method for retrieving the balance
    public function getBalance() {
        return $this->balance;
    }

    // Method for depositing money into the account
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposit successful. New balance: $this->balance\n";
        } else {
            echo "Invalid deposit amount\n";
        }
    }

    // Method for withdrawing money from the account
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawal successful. New balance: $this->balance\n";
        } else {
            echo "Invalid withdrawal amount or insufficient funds\n";
        }
    }
}

// Usage
$account = new BankAccount('123456789', 200);

// Accessing getters to retrieve information
echo 'Account Number: ' . $account->getAccountNumber() . "\n";
echo 'Initial Balance: $' . $account->getBalance() . "\n";

// Making deposits and withdrawals
$account->deposit(500);
$account->withdraw(200);
$account->withdraw(800); // This will output an error message

?>
