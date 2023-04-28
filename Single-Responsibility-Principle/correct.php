<?php

class JSON
{
    public static function format(object $object): string
    {
        return json_encode((array) $object);
    }
}

abstract class Validation
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';

    abstract protected function rules(): array;

    public function validate(): bool
    {
        foreach ($this->rules() as $property => $rules) {
            foreach ($rules as $rule) {
                if ($rule == self::RULE_REQUIRED && empty($this->{$property})) {
                    throw new Exception("{$property} must not be empty", 400);
                }
                if ($rule == self::RULE_EMAIL && !filter_var($this->{$property}, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("{$property} property is not valid email format", 400);
                }
            }
        }

        return true;
    }
}

class User extends Validation
{
    public ?string $name;
    public ?string $email;

    public function __construct(array $data)
    {
        $this->name = $data["name"] ?? null;
        $this->email = $data["email"] ?? null;
    }

    protected function rules() : array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }
}

try {

    $user = new User($_GET);

    if ($user->validate()) {
        echo JSON::format($user);
    }

} catch (\Throwable $th) {

    header('HTTP/1.1 400 Bad Request');
    echo "<h3>Bad request: 400</h3>";
    echo "<pre>{$th->getMessage()}</pre>";
    exit();
}
