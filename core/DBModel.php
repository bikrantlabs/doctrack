<?php

namespace app\core;

abstract class DBModel extends Model
{

    abstract protected function tableName(): string;

    /**
     * The list of attributes(columns) which are required to create
     * new row in database. `attributes` are used by `save()` method.
     * @return array
     */
    abstract protected function attributes(): array;

    protected function save(array $uniqueAttributes): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $stringAttributes = implode(',', $attributes);

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $paramsString = implode(',', $params);

        $nonUniqueAttributes = $this->checkUniqueValues($uniqueAttributes);

        if (!empty($nonUniqueAttributes)) {

            foreach ($nonUniqueAttributes as $attribute) {
                parent::addError($attribute, "Please enter a unique $attribute.");
            }
            return false;
        }

        Application::log("Proceeding to save ");

        $statement = self::prepare("INSERT INTO $tableName ($stringAttributes) VALUES ($paramsString) ");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    /**
     * Checks whether the provided attribute already has provided value or not.
     * @param array $uniqueAttributes array with keys for unique unique attributes. E.g. `[email, username]`
     * @return array list of attributes which are not unique
     */

    private function checkUniqueValues(array $uniqueAttributes): array
    {
        $tableName = $this->tableName();
        $errorsField = [];
        foreach ($uniqueAttributes as $attribute) {
            $statement = self::prepare("SELECT * FROM $tableName WHERE $attribute = :attr");
            $statement->bindValue(":attr", $this->{$attribute});
            $statement->execute();
            $record = $statement->fetchObject();
            if ($record) {
                $errorsField[] = $attribute;
            }
        }
        return $errorsField;
    }

    protected static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public function rules(): array
    {
        return [];
    }
}