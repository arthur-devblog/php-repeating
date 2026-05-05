<?php
declare(strict_types=1);

//1
$values = [0,"0",false,null,"",[],"php"];

foreach ($values as $value) {
    if (empty($value)) {
        echo "Zero" . PHP_EOL;
    } elseif ($value === "0") {
        echo "String Zero" . PHP_EOL;
    } elseif ($value === 0) {
        echo "Empty" . PHP_EOL;
    } else {
        echo "Other";
    }
}

/*
2-потосу что проверяются и типы
3-смысла $value === 0 $value === "0" не будет
*/

echo "<br />";

//2
$users = [
    ['name' => 'Aram', 'age' => 17, 'active' => true],
    ['name' => 'Karlen', 'age' => 28, 'active' => true],
    ['name' => 'Anna', 'age' => 22, 'active' => false],
    ['name' => 'Mariam', 'age' => 35, 'active' => true],
];

$filteredUsers = array_filter($users, function($user) {
    if (!is_int($user['age'])) {
        echo "Age must be integer type" . PHP_EOL;
    }
    else {
        $filtered = $user['age'] > 18 && $user['active'] === true;
    }
    return $filtered;
});

print_r($filteredUsers);

echo "<br />";

/*
добавить проверку если пустая нужно запулнить
добавить проверку на integer
мы создаём новый массив к старому не применяем
*/

//3
$order = [
    'paid' => true,
    'shipped' => false,
    'canceled' => false,
    'refunded' => false,
];

if ($order['cancelled']) {
    $status = 'cancelled';
} elseif ($order['refunded']) {
    $status = 'refunded';
} elseif ($order['paid'] && $order['shipped']) {
    $status = 'completed';
} elseif ($order['paid'] && !$order['shipped']) {
    $status = 'paid_waiting_shipping';
} else {
    $status = 'waiting_payment';
}

echo $status;

/*
cancelled должен иметь приоритет чтобы вернуть деньги
*/

//4
$user = [
    'is_auth' => true,
    'role' => 'manager',
    'blocked' => false,
];
function canAccessAdmin(array $user) : bool {

    $isAdmin = $user['role'] === 'admin' || $user['role'] === 'manager';
    $blockedUser = $user['blocked'];
    $authUser = $user['is_auth'];

    if (!in_array($user['role'], ['admin', 'manager'])) {
        return false;
    }
    if ($isAdmin && $authUser && !$blockedUser) {
        return true;
    }
    return false;
}

$userCheck = canAccessAdmin($user);

if (!$userCheck) {
    echo "you dont have access" . PHP_EOL;
} else {
    echo "welcome admin!" . PHP_EOL;
}

/*
2-ничего, программа поймёт
3-добавить проверку
*/

//5
$cart = [
    ['title' => 'Keyboard', 'price' => 100, 'qty' => 2],
    ['title' => 'Mouse', 'price' => 50, 'qty' => 1],
    ['title' => 'Monitor', 'price' => 300, 'qty' => 0],
];
$sum = 0;
foreach ($cart as $value) {
    if($value['qty'] > 0 ){
        $sum += (float)$value['price'] * (int)$value['qty'];
    }
}
echo $sum . PHP_EOL;

echo "<br />";

/*
проверить больше ли она нуля
приведём её к числу
проверить например через in_array
*/

//6
$tickets = [
    ['id' => 1, 'status' => 'new'],
    ['id' => 2, 'status' => 'done'],
    ['id' => 3, 'status' => 'new'],
    ['id' => 4, 'status' => 'in_progress'],
    ['id' => 5, 'status' => 'done'],
];

$sortedTickets = [];

foreach ($tickets as $ticket) {
    if (!isset($ticket['status']) || !isset($ticket['id'])) continue;
    elseif (!is_string($ticket['status']) && !is_int($ticket['status'])) continue;
    elseif (!is_int($ticket['id'])) continue;

    $sortedTickets[$ticket['status']][] = $ticket['id'];
}
echo "<pre>";
print_r($sortedTickets);
echo "</pre>";
echo "<br />";

/*
проверить через empty
добавить проверку
*/

//7
function isValidEmail(string $email) : bool {
    if (empty($email) || strlen($email) > 255) {
        return false;
    }
    elseif (!str_contains($email, '@')) {
        return false;
    }
    elseif (!str_contains($email, '.com')) {
        return false;
    }
    return true;
}

$emailCheck = isValidEmail("arthurgishyan2006@gmail.com");
if (!$emailCheck) {
    echo "invalid email" . PHP_EOL;
} else {
    echo "valid email" . PHP_EOL;
}

echo "<br />";

/*
чтобы в дальнейшем можно было делать проверку, с echo так не сможем
*/

//8
$request = [
    'amount' => 1000,
    'user_blocked' => false,
    'status' => 'pending',
    'phone' => '+37499999999',
];

function canAproove(array $request) : bool {
    if($request['amount'] <= 0) return false;
    if($request['user_blocked'] === false) return false;
    if($request['status'] !== 'pending') return false;
    if(empty($request['phone'])) return false;

    return true;
}

$aprooveCheck = canAproove($request);
if (!$aprooveCheck) {
    echo "cant aproove" . PHP_EOL;
} else {
    echo "cant aproove" . PHP_EOL;
}

echo "<br />";

/*

*/

//9
$products = [
    ['title' => 'A', 'price' => 100],
    ['title' => 'B', 'price' => 200],
    ['title' => 'C', 'price' => 300],
];

function applyDiscount(array $products, callable $callback) : array {
    foreach ($products as &$product) {
        $product['price'] = $callback($product['price']);
        unset($product);
    }

    return $products;
}
$discountedProducts = applyDiscount($products, function($price) {
    return $price * 0.5;
});

echo "<pre>";
print_r($discountedProducts);
echo "</pre>";

echo "<br />";

/*

*/

//10
function generateNumbers(bool $method ,int $from, int $to) : Generator {

    if($method) {
        if($from >= $to) {
            echo "from cant be bigger than to(you entered from smaller to bigger)" . PHP_EOL;
        }
        else {
            for ($i = $from; $i <= $to; $i++) {
                yield $i;
            }
        }
    }
    elseif(!$method) {
        if ($from <= $to) {
            echo "from cant be lesser than to(you selected from bigger to smaller)" . PHP_EOL;
        }
        for ($i = $from; $i >= $to; $i--) {
            yield $i;
        }
    }
}

foreach (generateNumbers(true,1,10) as $generated) {
    echo $generated . PHP_EOL;
}

echo "<br />";

foreach (generateNumbers(false,10,1) as $generated) {
    echo $generated . PHP_EOL;
}

echo "<br />";

foreach (generateNumbers(true,-10,10) as $generated) {
    echo $generated . PHP_EOL;
}

echo "<br />";

//11
$arr = [1, 2, 3];

foreach ($arr as &$value) {
    $value *= 2;
    unset ($value);
}

foreach ($arr as $value) {
    echo $value . ' ';
}

echo "<br />";

//12
$processedKeys = ['abc123', 'pay777'];

$payment = [
    'amount' => 1000,
    'idempotency_key' => 'sth1',
];

function handler(array $payment, array $processedKeys) : array {
    $value = $payment['idempotency_key'];

    if(!in_array($value, $processedKeys)) {
        $processedKeys[] = $value;
    }
    return $processedKeys;
}

$handledPayment = handler($payment, $processedKeys);
echo "<pre>";
print_r($handledPayment);
echo "</pre>";

//13
$requests = [
    'user_1' => 5,
    'user_2' => 2,
];

function canMakeRequest(string $userId, array $request) : bool {
    $maxRequests = 5;

    $userRequests = $request[$userId];

    if ($userRequests >= $maxRequests) {
        return false;
    }
    return true;
}
$requestCheck = canMakeRequest("user_1", $requests);
var_dump($requestCheck);

echo "<br />";

//14
//15
$roles = ['admin', 'manager', 'accountant', 'user'];
$permissions = ['create_user', 'delete_user', 'view_reports', 'edit_payment'];

function can(string $role, string $permission) : bool {
    $rolesAndPermissions = [
      "admin" => ["create_user", "delete_user", "view_reports", "edit_payment"],
      "manager" => ["view_reports"],
      "accountant" => ["edit_payment"],
      "user" => []
    ];
    if (!array_key_exists($role, $rolesAndPermissions)) {
        return false;
    }

    return in_array($permission, $rolesAndPermissions[$role], true);
}
$canDo = can("admin", "create_user");
$canDo1 = can("manager", "create_user");
$canDo2 = can("accountant", "create_user");
var_dump($canDo);
var_dump($canDo1);
var_dump($canDo2);

echo "<br />";

//16
$jobs = [
    ['id' => 1, 'priority' => 'low'],
    ['id' => 2, 'priority' => 'high'],
    ['id' => 3, 'priority' => 'medium'],
    ['id' => 4, 'priority' => 'high'],
];

$highJobs = [];
$mediumJobs = [];
$lowJobs = [];
$unknownJobs = [];

foreach ($jobs as $job) {
    if ($job['priority'] === 'high') {
        $highJobs[] = $job;
    } elseif ($job['priority'] === 'medium') {
        $mediumJobs[] = $job;
    } elseif ($job['priority'] === 'low') {
        $lowJobs[] = $job;
    } else {
        $unknownJobs[] = $job;
    }
}

$sortedJobs = array_merge($highJobs, $mediumJobs, $lowJobs, $unknownJobs);

print_r($sortedJobs);

echo "<br />";

//17
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$evenNumbers = [];

foreach ($numbers as $number) {
    if ($number % 2 === 0) {
        $evenNumbers[] = $number;
    }
}

$sum = array_sum($evenNumbers);

echo $sum;
echo "<br />";

//18
$text = "hello world from php";

$words = explode(" ", $text);
$result = [];

foreach ($words as $word) {
    $firstLetter = strtoupper($word[0]);
    $fullText = $firstLetter . substr($word, 1);
    $result[] = $fullText;
}

echo implode(" ", $result);

echo "<br />";

//19
$data = [
    ['name' => 'A', 'score' => 10],
    ['name' => 'B', 'score' => 30],
    ['name' => 'C', 'score' => 20],
];

if (!empty($data)) {
    $maxScore = $data[0];
    foreach ($data as $value) {
        if ($maxScore > $value) {
            $maxScore = $value;
        }
    }
}
print_r($maxScore);

echo "<br />";

//20
$requests = [
    ['id' => 1, 'user_id' => 10, 'amount' => 1000, 'status' => 'pending', 'phone' => '+374...', 'blocked' => false],
    ['id' => 2, 'user_id' => 11, 'amount' => 0, 'status' => 'pending', 'phone' => '+374...', 'blocked' => false],
    ['id' => 3, 'user_id' => 12, 'amount' => 500, 'status' => 'approved', 'phone' => '', 'blocked' => false],
    ['id' => 4, 'user_id' => 13, 'amount' => 700, 'status' => 'pending', 'phone' => '+374...', 'blocked' => true],
];

function requestFilter(array $requests) : array {
    $result = [];
    $errors = [];

    if (empty($requests)) {
        $errors[] = 'requests is empty';
    } else {

        foreach ($requests as $request) {

            if ($request['blocked']) {
                $errors[] = 'User blocked';
            }
            elseif ($request['status'] === 'approved') {
                $errors[] = 'User already approved';
            }
            elseif ($request['amount'] <= 0) {
                $errors[] = 'Amount must be greater than 0';
            }
            elseif (empty($request['phone'])) {
                $errors[] = 'Phone empty';
            }
            else {
                $result[] = $request;
            }
        }
    }

    return [
        'Approved' => $result,
        'Errors' => $errors
    ];
}

$filteredRequests = requestFilter($requests);
print_r($filteredRequests);