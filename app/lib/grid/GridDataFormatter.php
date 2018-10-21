<?php
/**
 * Class GridDataFormatter
 *
 * @project <Grid Data Providing for PHP language>
 * @package App\lib\grid
 * @author ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid {
    
    class GridDataFormatter
    {
        //TODO Make grid data fields mutable according to it's data format.
        
        public static function dashName(string $name)
        {
            return trim(strtolower(preg_replace('/([A-Z])/', '-$1', $name)), '-');
        }
        
        public static function setAttribute(array $src, array $attr)
        {
            foreach ($attr as $k => $v)
            {
                if ($v === '' || $v === false || $v === null)
                {
                    if (isset($src[$k]))
                        
                        unset($src[$k]);
                    
                    continue;
                }
                
                if (is_array($v))
                {
                    $src[$k] = false == isset($src[$k])
                        
                        ? $v : array_merge(is_array($src[$k]) ? $src[$k] : explode("\x20", $src[$k]), $v);
                    
                    foreach ($src[$k] as $kk => $vv)
                    {
                        if ($vv === '' || $vv === false || $vv === null)
                        {
                            if (($key = array_search($kk, $src[$k])) !== false)
                                
                                unset($src[$k][$key]);
                            
                            unset($src[$k][$kk]);
                        }
                    }
                    
                    continue;
                }
                
                $src[$k] = $v;
            }
            
            return $src;
        }
        
        public static function getAttributes(array $src): string
        {
            $output = [];
            
            foreach ($src as $k => $v)
            {
                $inn = [];
                
                if (is_array($v))
                {
                    foreach ($v as $kk => $vv)
                    {
                        switch ($k)
                        {
                            case 'data':
                                
                                $output[] = sprintf('data-%s="%s"', $kk, $vv);
                                
                                break;
                            
                            case 'style':
                                
                                $inn[] = sprintf('%s:%s;', $kk, $vv);
                                
                                break;
                            
                            default:
                                
                                $inn[] = $vv;
                        }
                    }
                    
                    if ($k === 'data') continue;
                }
                
                $output[] = sprintf('%s="%s"', $k, $inn ? join("\x20", $inn) : (is_array($v) ? join("\x20", $v) : $v));
            }
            
            return join("\x20", $output);
        }
    }
}
