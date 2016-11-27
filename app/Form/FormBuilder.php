<?php namespace App\Form;

use AdamWathan\Form\FormBuilder as BootFormsFormBuilder;
use App\Form\Elements\FormOpen;

class FormBuilder extends BootFormsFormBuilder
{

    public function open()
    {
        $open = new FormOpen;

        if ($this->hasToken()) {
            $open->token($this->csrfToken);
        }

        return $open;
    }

    public function close()
    {
        $this->unbindData();

        return '</fieldset></form>';
    }
}
