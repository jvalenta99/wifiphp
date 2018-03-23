<?php

class Checkbox extends Input {
    
    public function render() {
        $out = $this->renderField();
        return $out;
    }
    public function renderField() : string {
        $out = '<label for="' . $this->id .
                 '">';
        
        $out = '<input type="checkbox" ' .
                'name="' . $this->name . '" ' .
                'value="' . $this->value . '" ' .
                'id="' . $this->id . '"';

        // Tag Attributes
        $out .= $this->renderTagAttributes();
        // Tag schließen
        $out .= '>';
        
        
        $out .= $this->label .'</label>';

        return $out;
    }//
}