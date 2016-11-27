<?php namespace App\Form\Elements;

use AdamWathan\Form\Elements\FormOpen as BootFormsFormOpen;

class FormOpen extends BootFormsFormOpen
{

    public function render()
    {
        $tags = [sprintf('<form%s><fieldset>', $this->renderAttributes())];

        if ($this->hasToken() && ($this->attributes['method'] !== 'GET')) {
            $tags[] = $this->token->render();
        }

        if ($this->hasHiddenMethod()) {
            $tags[] = $this->hiddenMethod->render();
        }

        return implode($tags);
    }
}
