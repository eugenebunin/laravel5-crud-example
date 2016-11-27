<?php namespace App\BootForms;

use AdamWathan\BootForms\BasicFormBuilder as BootFormsBasicFormBuilder;
use App\Form\FormBuilder;
use AdamWathan\Form\FormBuilder as BootFormsFormBuilder;
use App\BootForms\Elements\FormGroup;

class CustomFormBuilder extends BootFormsBasicFormBuilder
{
    public function __construct(BootFormsFormBuilder $builder)
    {
        $this->builder = new FormBuilder;

        $app = app();
        $this->builder->setErrorStore($app['adamwathan.form.errorstore']);
        $this->builder->setOldInputProvider($app['adamwathan.form.oldinput']);
        $this->builder->setToken($app['session.store']->getToken());
    }

    public function customText($label, $name, $value = null, array $attributes = [])
    {
      $control = $this->builder->text($name)->value($value);
      return $this->formGroup($label, $name, $control);
    }

    protected function formGroup($label, $name, $control)
    {
        $label = $this->builder->label($label)->addClass('control-label label')->forId($name);
        $control->id($name)->addClass('form-control');

        $formGroup = new FormGroup($label, $control);

        if ($this->builder->hasError($name)) {
            $formGroup->helpBlock($this->builder->getError($name));
            $formGroup->addClass('has-error');
        }

        return $this->wrap($formGroup);
    }
}
