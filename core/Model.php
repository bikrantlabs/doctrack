<?php

namespace app\core;

abstract class Model
{

    public array $errors = [];

    public function loadData($data)
    {

        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    abstract public function rules(): array;

    /**
     *  ``` return [
     *       "fullname" => ["required", ["min", 3], ["max", 50]],
     *     "email" => ["required", "email"],
     *      "password" => ["required", ["min", 8], ["max", 127]],
     *      "confirmPassword" => ["required", ["match", "password"]]
     *  ]; ```
     */

    public function validate(): bool
    {
        $allRules = $this->rules();

        foreach ($allRules as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach ($rules as $rule) {
                // Handle String rule.
                if (is_string($rule)) {
                    if ($rule === "required" && !$value) {
                        $this->addError($attribute, "This field is required");
                    }

                    if ($rule === "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError($attribute, "This field must be a valid email address");
                    }
                }

                // Handle array rules with parameters. ["min", 8]

                if (is_array($rule)) {
                    [$ruleName, $ruleValue] = $rule;

                    if ($ruleName === "min" && strlen($value) < $ruleValue) {
                        $this->addError($attribute, "This field must be at least {$ruleValue} characters long");
                    }

                    if ($ruleName === "max" && strlen($value) > $ruleValue) {
                        $this->addError($attribute, "This field must be at most {$ruleValue} characters long");
                    }

                    if ($ruleName === "match") {
                        if ($value !== $this->{$ruleValue}) {
                            $this->addError($attribute, "This field must match {$ruleValue}");
                        }
                    }
                }
            }
            # code...
        }

        return empty($this->errors);
    }

    /**
     * Add an error to a specific attribute
     */
    protected function addError(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }

    /**
     * Get first error for an attribute
     */
    public function getFirstError(string $attribute)
    {
        return $this->errors[$attribute][0] ?? null;
    }


    public function hasError(string $attribute): bool
    {
        return !empty($this->errors[$attribute]);
    }
}
