<?php
declare(strict_types=1);

class Person {
    private array $person;
    public function __construct()
    {
        $this->person = [
            "name" => "Unnamed",
            "age" => 18,
            "gender" => "Non-Selected"
        ];
    }
    public function __get($property)
    {
        if (!array_key_exists($property, $this->person)) {
            echo "Property $property does not exist";
            return null;
        }

        return $this->person[$property];
    }
    public function __set($property, $value) {
        $this->person[$property] = $value;
    }
    public function __isset($property) {
        return isset($this->person[$property]);
    }
    public function __toString(): string
    {
        return "Name: {$this->person['name']}, Age: {$this->person['age']}, Gender: {$this->person['gender']}";
    }
}

$myPerson = new Person();
$myPerson->name = "Arthur";
$myPerson->age = 19;
echo $myPerson;
echo "<br />";
echo $myPerson->job;
echo "<br />";

//__call and __callStatic

class MusicInfo {
    public string $musicName;
    public string $playlistName;

    public function __construct(string $musicName, string $playlistName)
    {
        $this->musicName = $musicName;
        $this->playlistName = $playlistName;
    }

    public function __call(string $name = "empty", array $params = []) {
        echo "There is no method $name with parameter " . implode(": ", $params) . "<br />";
    }
    public static function __callStatic(string $name = "empty", array $arguments = [])
    {
        echo "There is no static method $name with parameter " . implode(": ", $arguments) . "<br />";
    }
}

$mp3Player = new MusicInfo("Music name", "Playlist name");
var_dump($mp3Player->playlistName);
var_dump ($mp3Player->musicName);
echo "<br />";
echo $mp3Player->turnOn("programm");
echo "<br />";
echo MusicInfo::turnOff("programm");

echo "<br />";

//debug info
class DebugTest {
    public function __construct(public $name, private $apiToken, private $password)
    {

    }
    public function __debugInfo(): ?array
    {
        return [
            "name" => $this->name,
            "apiToken" => substr($this->apiToken, 0, 4) . "****",
            "password" => "password_hidden"
        ];
    }
}
$debugger = new DebugTest("Arthur", "ap4kf-4448", "pass123");
var_dump($debugger);

//invoke
class invokeTest {
    public function __construct(private int $min_salary, private int $max_salary)
    {

    }

    public function __invoke(array $user) : bool
    {
        return $user["salary"] >= $this->min_salary && $user["salary"] <= $this->max_salary;
    }
}

$users = [
    ["name" => "Poghos", "age" => 18, "salary" => 100000],
    ["name" => "Petros", "age" => 18, "salary" => 15000],
    ["name" => "Martiros", "age" => 18, "salary" => 230000]
];

$invokedObj = new InvokeTest(100, 20000);

$result = array_filter($users, $invokedObj);
print_r($result);

