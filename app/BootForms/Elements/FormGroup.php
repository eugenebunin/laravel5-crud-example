<?php namespace App\BootForms\Elements;

use AdamWathan\BootForms\Elements\FormGroup as BootFormsFormGroup;
use AdamWathan\Form\Elements\Element;
use AdamWathan\Form\Elements\Label;

class FormGroup extends BootFormsFormGroup
{

    protected $icon;

    public function __construct(Label $label, Element $control, $icon = null)
    {
        parent::__construct($label, $control);
        $this->setIcon($icon);
    }

    public function render()
    {
        $html = '<section';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->label;
        $html .= '<label class="input">';
        $html .= $this->icon;
        $html .= $this->control;
        $html .= $this->renderHelpBlock();
        $html .= '</label>';
        $html .= '</section>';

        return $html;
    }

    protected function setIcon($icon)
    {
        if ( $icon ) {
            $this->icon = sprintf('<i class = "%s"></i>', $icon);
        }
    }
}
