<?php
declare(strict_types=1);

namespace Employee\Data;

class Storage {
    private static array $employees = [
        ["name"=>"User1", "lastName"=> "Last Name", "role"=>"Manager", "salary"=>100000.0, "experience"=>4],
        ["name"=>"User2", "lastName"=> "Last Name", "role"=>"Developer", "salary"=>142000.0, "experience"=>5],
        ["name"=>"User3", "lastName"=> "Last Name", "role"=>"Developer", "salary"=>74500.0, "experience"=>2],
        ["name"=>"User4", "lastName"=> "Last Name", "role"=>"Manager", "salary"=>3000000.0, "experience"=>8],
        ["name"=>"User5", "lastName"=> "Last Name", "role"=>"Developer", "salary"=>74500.0, "experience"=>2],
        ["name"=>"User6", "lastName"=> "Last Name", "role"=>"Developer", "salary"=>200000.0, "experience"=>2],
        ["name"=>"User7", "lastName"=> "Last Name", "role"=>"Developer", "salary"=>81600.0, "experience"=>2],
        ["name"=>"User8", "lastName"=> "Last Name", "role"=>"Manager", "salary"=>30000.0, "experience"=>0],
    ];
    public static function getRawData(): array {
        return self::$employees;
    }
}