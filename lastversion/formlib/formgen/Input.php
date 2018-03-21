<?php

class Input {
    protected $name = '';
    protected $type = '';
    protected $id = '';
    protected $value = '';
    protected $label = '';
    protected $tagAttributes = [];

    public function __construct(string $name, array $fieldConf)
    {
        // name
        $this->name = $name;

        // type
        if (!array_key_exists('type', $fieldConf) || $fieldConf['type'] === '') {
            die($this->name . ' type not defined');
        }
        $this->type = $fieldConf['type'];

        // id
        if (!array_key_exists('id', $fieldConf) || $fieldConf['id'] === '') {
            // TODO: id muss wirklich eindeutig sein
            $this->id = $this->name;
        }
        $this->id = $fieldConf['id'];

        // value optional
        if (array_key_exists('value', $fieldConf)) {
            $this->value = $fieldConf['value'];
        }

         // label optional
         if (!array_key_exists('label', $fieldConf) || $fieldConf['label'] === '') {
            $this->label = $this->name;
        }
        $this->label = $fieldConf['label'];
       
        // tagattributes optional
        if (array_key_exists('tagAttributes', $fieldConf) && is_array($fieldConf['tagAttributes'])) {
            $this->tagAttributes = $fieldConf['tagAttributes']; 
        }
        print_r($this);
    }

    public function render() {
        $out = '';

        return $out;
    }

}