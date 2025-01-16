<?php

namespace core;
//Հարցում ստանալու համար նախատեսված կլասն է
class Request
{
    public string $uri;
    protected array $data;
    public function __construct($uri)
    {
        if (is_array($uri)) {
            $uri = implode('/', $uri); // Convert array to string if needed
        }
        $this->uri = urldecode($uri);
        //var_dump($this->uri);
    }

    public function initialize()
    {
        $this->data = $_POST;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function input(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }
    //Հասկանալու համար թե ինչ մեթոդ է օգտագործվել գրվում է հետևյալ ֆունկցիան
    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }
    //Որպեսզի ստուգենք հարցումը GET թե POSt մեթոդով է գրում ենք isget և ispost Ֆ-ները
    public function isGet(): bool
    {
        return $this->getMethod() == 'GET';
    }
    public function isPost(): bool
    {
        return $this->getMethod() == 'POST';
    }
    public function isAjax(): bool
    {
        //return $this->getMethod() == 'AJAX';
        return isset($_SERVER ['HTTP_X_REQUESTED_WITH']) && $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
    //get և post զանգվածներից key-ի միջոցով վալյուն ստանանք
       public function get($name,$default = null): ?string
    {
        return $_GET[$name] ?? $default; // եթե վալյուն կա վերադարձրու, եթե ոչ,ապա այն ինչ կա
    }
    public function post($name,$default = null): ?string
    {
        return $_POST[$name] ?? $default;
    }
    public function getPath(): string
    {
        return $this->removeQueryString();
    }
    protected function removeQueryString(): string
    {

     if($this->uri){
         $uri = str_replace('/dental_clinic_mushegh', '', $this->uri);
         $params = explode('?', $uri);

         return trim($params[0],'/');

     }
     return "";
    }
    public function getData(): array
    {
        $data = [];
        $request_data = $this->isPost() ? $_POST : $_GET;
        foreach ($request_data as $key => $value) {
            if(is_string($value)){
                $value = trim($value);
            }
            $data[$key] = $value;
        }
        return $data;
    }

    public function hasFile(string $field): bool
    {
        // Check if the field is present in the $_FILES array and if it has been uploaded
        return isset($_FILES[$field]) && $_FILES[$field]['error'] !== UPLOAD_ERR_NO_FILE;
    }

    /**
     * Retrieve the uploaded file for the given field
     *
     * @param string $field The name of the input field (e.g., 'image')
     * @return mixed The file data or null if no file is present
     */
    public function file(string $field)
    {
        // Check if the field exists in the $_FILES array
        if ($this->hasFile($field)) {
            // Return the file data
            return $_FILES[$field];
        }

        return null;
    }


}