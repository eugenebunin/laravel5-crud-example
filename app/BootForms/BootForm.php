<?php namespace App\BootForms;

use AdamWathan\BootForms\BootForm as BootFormsBootForm;
use AdamWathan\BootForms\BasicFormBuilder;
use AdamWathan\BootForms\HorizontalFormBuilder;
use App\BootForms\CustomFormBuilder;

class BootForm extends BootFormsBootForm
{
    protected $customFormBuilder;

    public function __construct(BasicFormBuilder $basicFormBuilder, HorizontalFormBuilder $horizontalFormBuilder, CustomFormBuilder $customFormBuilder)
    {
        parent::__construct($basicFormBuilder, $horizontalFormBuilder);

        $this->basicFormBuilder = $basicFormBuilder;
        $this->horizontalFormBuilder = $horizontalFormBuilder;
        $this->customFormBuilder = $customFormBuilder;
    }

    public function customOpen()
    {
        $this->builder = $this->customFormBuilder;
        return $this->builder->open();
    }
}
