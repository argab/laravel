<?php
/**
 * Created by PhpStorm.
 * @author ArGabid <argabid@gmail.com>
 */

namespace App\traits
{
    trait TModel
    {
        private $_errors = [];

        public function loadData(array $data)
        {
            if ($fillable = $this->fillable)
            {
                foreach ($fillable as $item)
                {
                    $this->{$item} = $data[$item] ?? null;
                }

                return true;
            }

            return false;
        }

        public function setErrors(array $errors)
        {
            $this->_errors = $errors;
        }
    }

}