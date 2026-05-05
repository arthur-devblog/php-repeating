<?php
declare(strict_types=1);

class User {
    private string $name;
    private string $_login;
    private string $_password;
    public readonly string $_status;

    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->_login = $login;
        $this->_password = $password;
    }
    public function adminCheck() : string {
        if($this->_login === 'admin' && $this->_password === '123') {
            $this->_status = 'admin';
            return $this->_status;
        }
        $this->_status = 'user';
        return $this->_status;
    }
    public function resetPassword($newPass) : void {
        $this->password = $newPass;
    }
    public function getInfo() : string {
        return "name: " . $this->name . " login: " . $this->_login . ", password: ***hashed***" . ", role: " . $this->_status;
    }
}
$user = new User("Arthur", "admin", "123");
$user->adminCheck();
print $user->getInfo();