<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\ValidationException;

class BaseModel extends Model
{
    public function validate($data, $id = '')
    {
        if (isset($this->rules['title']))
        {
            $this->rules['title'] = str_replace('{id}', $id, $this->rules['title']);
        }

        $validator = Validator::make($data, $this->rules);

        if ($validator->fails())
        {
            throw new ValidationException($validator);
        }
    }
}
