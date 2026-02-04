<?php

namespace app\core\form;

use app\core\Model;

class Form
{
    private string $action = '';
    private string $method = 'post';
    private array $attributes = []; // class, id, data-*, etc.

    /**
     * Begin a form and return instance
     */
    public static function begin(string $action, string $method = 'post'): Form
    {
        $form = new Form();
        $form->action = $action;
        $form->method = $method;
        return $form;
    }

    /**
     * Set class(es)
     */
    public function class(string $classes): Form
    {
        $this->attributes['class'] = $classes;
        return $this;
    }

    /**
     * Set id
     */
    public function id(string $id): Form
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * Add arbitrary attribute
     */
    public function attr(string $key, string $value): Form
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * Render the opening <form> tag
     */
    public function renderOpen()
    {
        $attrStr = '';
        foreach ($this->attributes as $key => $value) {
            $attrStr .= sprintf(' %s="%s"', $key, htmlspecialchars($value));
        }
        echo sprintf(
            '<form action="%s" method="%s"%s>',
            htmlspecialchars($this->action),
            htmlspecialchars($this->method),
            $attrStr
        );
        return $this;
    }

    /**
     * Render closing </form> tag
     */
    public static function end(): string
    {
        return '</form>';
    }

    /**
     * Create a field
     */
    public function field(Model $model, string $attribute): Field
    {
        return new Field($model, $attribute);
    }
}
