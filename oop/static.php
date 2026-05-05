<?php
declare(strict_types=1);

class University {
    public function __construct()
    {

    }

    public static $universityName = "Asue";
    public static function getUniversityName(): string {
        return self::$universityName;
    }
}

class Student extends University {
    protected string $name;
    protected string $lastName;
    protected int $age;
    protected float $score;

    public function __construct(string $name, string $lastName, int $age, float $score)
    {
        University::__construct();
        $this->name = $name;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->score = $score;
    }

    public function getName(): string {
        return "Name: " . $this->name;
    }
    public function getLastName(): string {
        return "Last Name: " . $this->lastName;
    }
    public function getAge(): int|string {
        return "Age: " . $this->age;
    }
    public function getScore(): float|string {
        return "Score: " . $this->score;
    }
}

$student1 = new Student("Arthur", "Gishyan", 19,14.29);
print Student::$universityName;
print $student1->getName() . PHP_EOL;
print $student1->getLastName() . PHP_EOL;
print $student1->getAge() . PHP_EOL;
print $student1->getScore() . PHP_EOL;

class BankAccount {
    const MIN_BALANCE = 0;
    const CURRENCY = "AMD";

    readonly protected string $owner;

    protected readonly string $accountNumber;

    static int $totalAccount = 0;

    private int $balance = 0;

    public function __construct(string $owner, string $accountNumber)
    {
        $this->owner = $owner;
        $this->accountNumber = $accountNumber;
        static::$totalAccount++;
    }

    public function deposit(int $amount) : int{
        return $this->balance += $amount;
    }

    public function getBalance() : int {
        return $this->balance;
    }

    public function getInfo() : string {
        return "accountNumber: " . $this->accountNumber . ", balance: " . $this->balance . " owner: " . $this->owner . PHP_EOL;
    }
}