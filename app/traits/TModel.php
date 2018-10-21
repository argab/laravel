<?php
/**
 * Created by PhpStorm.
 * @author ArGabid <argabid@gmail.com>
 */

namespace App\traits
{

    trait TModel
    {
        public function loadData(array $data)
        {
            try
            {
                if ($fillable = $this->fillable)
                {
                    foreach ($fillable as $item)
                    {
                        $this->{$item} = $data[$item] ?? null;
                    }

                    return true;
                }
            }
            catch (\Exception $e)
            {
                return null;
            }

            return false;
        }
    }

}