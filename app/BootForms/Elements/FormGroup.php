<?php namespace App\BootForms\Elements;

use AdamWathan\BootForms\Elements\FormGroup as BootFormsFormGroup;

class FormGroup extends BootFormsFormGroup
{

    public function render()
    {
        $html = '<section';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->label;
        $html .= '<label class="input">';
        $html .= $this->control;
        $html .= $this->renderHelpBlock();
        $html .= '</label>';
        $html .= '</section>';

        return $html;
    }
}
