<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\ValidationException;

class BaseModel extends Model
{
    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails())
        {
            throw new ValidationException($validator);
        }
    }
}
