<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public Model $model;
    public string $attribute;
    public string $type = 'text'; // default
    public array $options = []; // for select, radio, checkboxes

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    // Allow chaining to set type
    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    // Allow options for select/radio/checkbox
    public function options(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function __toString()
    {
        $labelFor = $this->attribute;
        $labelText = $this->model->labels()[$this->attribute];
        $fieldName = $this->attribute;
        $fieldId = $this->attribute;
        $fieldValue = $this->model->{$this->attribute};
        $errorClass = $this->model->hasError($this->attribute) ? 'is-invalid' : '';
        $errorMsg = $this->model->getFirstError($this->attribute);

        $html = "<div class='form-group'>";
        $html .= "<label for='$labelFor'>$labelText</label>";

        switch ($this->type) {
            case 'textarea':
                $html .= sprintf(
                    '<textarea name="%s" id="%s" class="form-control %s">%s</textarea>',
                    $fieldName,
                    $fieldId,
                    $errorClass,
                    htmlspecialchars($fieldValue)
                );
                break;

            case 'select':
                $html .= sprintf('<select name="%s" id="%s" class="form-control %s">', $fieldName, $fieldId, $errorClass);
                foreach ($this->options as $value => $text) {
                    $selected = $fieldValue == $value ? 'selected' : '';
                    $html .= sprintf('<option value="%s" %s>%s</option>', $value, $selected, $text);
                }
                $html .= '</select>';
                break;

            case 'radio':
                foreach ($this->options as $value => $text) {
                    $checked = $fieldValue == $value ? 'checked' : '';
                    $html .= sprintf(
                        '<div class="form-check"><input class="form-check-input %s" type="radio" name="%s" id="%s_%s" value="%s" %s>
                        <label class="form-check-label" for="%s_%s">%s</label></div>',
                        $errorClass,
                        $fieldName,
                        $fieldId,
                        $value,
                        $value,
                        $checked,
                        $text
                    );
                }
                break;

            case 'checkbox':
                foreach ($this->options as $value => $text) {
                    $checked = in_array($value, (array)$fieldValue) ? 'checked' : '';
                    $html .= sprintf(
                        '<div class="form-check"><input class="form-check-input %s" type="checkbox" name="%s[]" id="%s_%s" value="%s" %s>
                        <label class="form-check-label" for="%s_%s">%s</label></div>',
                        $errorClass,
                        $fieldName,
                        $fieldId,
                        $value,
                        $value,
                        $checked,
                        $text
                    );
                }
                break;

            default:
                // default input
                $inputType = $this->type;
                $html .= sprintf(
                    '<input type="%s" name="%s" id="%s" value="%s" class="form-control %s">',
                    $inputType,
                    $fieldName,
                    $fieldId,
                    htmlspecialchars($fieldValue),
                    $errorClass
                );
        }

        $html .= "<div class='invalid-feedback'>$errorMsg</div>";
        $html .= "</div>";

        return $html;
    }
}
