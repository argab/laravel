<?php
/**
 * Interface IGridFormProvider
 *
 * @project <Grid Data Providing for PHP language>
 * @package App\lib\grid
 * @author ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid {
    
    interface IGridFormProvider extends IGridProvider
    {
        public function gridInputTypes(): array;
        
        public function gridInputSizes(): array;
        
        public function gridInputOptions(): array;
        
        public function gridInputPrompts(): array;
        
        public function gridInputErrors(): array;
    }
}
