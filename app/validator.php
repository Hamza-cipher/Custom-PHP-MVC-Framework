<?php
    /**
     * Validation Class: This class is for validation of html forms.
     * 
     *  NOTE: Please read documentation to view usage of validator class.
     * 
     */
    class Validator 
    {
        public  $errors = [];
        public function validate($data,$fieldRules){   
            foreach ($data as $field => $value) {
                if(isset( $fieldRules[$field])){
                    $rules = $fieldRules[$field];
                    $rules = explode("|",$rules);
                    foreach($rules as $rule){
                        $rule = explode(":", $rule);
                        if(isset($rule[1])){
                            $method = $rule[0]."Validation";
                            $response = $this->$method($value,$rule[1],$field);
                        }else{
                            $method = $rule[0]."Validation";
                            $response = $this->$method($value,$field);
                        }
                        
                        if($response !== true){
                            $this->errors[$field] = $response; 
                        }
                    }
                }
            }
            return $this->errors;     
        }

        
        public function requiredValidation($value,$field){
            return empty($value)? $field ." should not be empty": true;
        }

        
        public function lengthValidation($value,$length,$field){
            if(strlen($value) < $length){
                return $field." length should be greater than ".$length;
            }
            else{
                return true; 
            }    
        }

        
        public function emailValidation($value,$field){
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                return $field. " should be in email format";
            }
            return true;
        }
    }
