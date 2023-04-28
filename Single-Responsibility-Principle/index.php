<?php

class User
{
    public ?string $name;
    public ?string $email;

    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->email = $data["email"];
    }

    public function validate() : bool
    {
        if (empty($this->name)) {
            throw new Exception("<name> property must not be empty", 400);
        }
        if (empty($this->email)) {
            throw new Exception("<email> property must not be empty", 400);
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("<email> property is not valid email format");
        }
        return true;
    }

    public function getJson() : string
    {
        return json_encode(["name" => $this->name, "email" => $this->email]);
    }
}

try {
    $user = new User($_GET);
    if ($user->validate()) {
        echo $user->getJson();
    }
} catch (\Throwable $th) {
    header('HTTP/1.1 400 Bad Request');
    echo "<h3>Bad request: 400</h3>";
    echo "<pre>{$th->getMessage()}</pre>";
    exit();
}
