<?php
namespace Formgen;

class Submit extends Input {
    

    public function renderField() : string {
        $out = '<input type="submit" ' .
                'name="' . $this->name . '" ' .
                'id="' . $this->id . '"'. 'value="' . $this->value . '"';
        
        // Tag Attributes
        $out .= $this->renderTagAttributes();
        // Tag schließen
        $out .= '>';

        return $out;
    }
}