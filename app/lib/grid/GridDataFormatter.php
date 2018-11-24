<?php
/**
 * Class GridDataFormatter
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{

    use Exception;

    class GridDataFormatter
    {
        protected $format = [];

        protected $formats = [['htmlEncode', []]];

        protected $value;

        /**
         * @param mixed $value
         *
         * @return $this
         */
        public function setValue($value)
        {
            $this->value = $value;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * @param array $fieldFormats
         *
         * @return $this
         * @throws Exception
         */
        public function setFormat(array $fieldFormats)
        {
            foreach ($fieldFormats as $format)
            {
                if (false == is_array($format))

                    throw new Exception('The format field parameter is not properly defined.');

                $methods = [];

                foreach ((array) $format[1] as $k => $v)
                {
                    if (method_exists($this, $k))

                        $methods[] = [$k, (array) $v];

                    elseif (method_exists($this, $v))

                        $methods[] = [$v, []];
                }

                foreach ((array) $format[0] as $field)
                {
                    $this->format[$field] = [];

                    foreach ($this->mergeFormats($methods) as $method => $params)
                    {
                        $this->format[$field][] = [$method, $params];
                    }
                }
            }

            return $this;
        }

        /**
         * @param array $methods
         *
         * @return array
         */
        public function mergeFormats(array $methods)
        {
            $formats = [];

            foreach (array_merge($this->formats, $methods) as $k => $v)
            {
                $formats[$v[0]] = $v[1];
            }

            if (isset($formats['rawHtml']))

                $formats = array_diff_key($formats, ['htmlEncode' => true, 'stripHtml' => true, 'stripTags' => true]);

            return $formats;
        }

        /**
         * @param array $formats
         *
         * @return $this
         */
        public function setFormatAll(array $formats)
        {
            $this->formats = [];

            foreach ($formats as $k => $v)
            {
                if (method_exists($this, $k))

                    $this->formats[] = [$k, (array) $v];

                elseif (method_exists($this, $v))

                    $this->formats[] = [$v, []];
            }

            return $this;
        }

        /**
         * @param string $field
         * @param mixed $value
         *
         * @return GridDataFormatter
         */
        public function format(string $field, $value)
        {
            $this->value = $value;

            if (isset($this->format[$field]))

                return $this->formatField($this->format[$field]);

            return $this->formatField($this->formats);
        }

        protected function formatField(array $methods)
        {
            for ($i = 0; $i < sizeof($methods); ++$i)
            {
                call_user_func_array([$this, $methods[$i][0]], $methods[$i][1]);
            }

            return $this;
        }

        /**
         * @return $this
         */
        public function rawHtml()
        {
            $this->value = html_entity_decode($this->value, ENT_QUOTES);

            return $this;
        }

        /**
         * @return $this
         */
        public function htmlEncode()
        {
            $this->value = htmlentities($this->value, ENT_QUOTES);

            return $this;
        }

        /**
         * @param array $allowTags
         *
         * @return $this
         */
        public function stripTags(array $allowTags = [])
        {
            $this->value = strip_tags($this->value, $allowTags);

            return $this;
        }

        /**
         * @param int $size      = 20
         * @param string $suffix = '...'
         *
         * @return $this
         */
        public function truncate(int $size = 20, string $suffix = '...')
        {
            $words = preg_split('/(\s+)/u', trim($this->value), null, PREG_SPLIT_DELIM_CAPTURE);

            if (sizeof($words) / 2 > $size)

                $this->value = implode('', array_slice($words, 0, ($size * 2) - 1)) . $suffix;

            return $this;
        }

        /**
         * Removes all HTML tags, javascript sections, whitespace characters.
         * It is also necessary to replace some HTML entities at their equivalent.
         *
         * @param bool $nl2br = true
         *
         * @return string
         */
        public function stripHtml(bool $nl2br = true)
        {
            $search = [
                "'<script[^>]*?>.*?</script>'si",  # cut javaScript
                "'<[\/\!]*?[^<>]*?>'si",           # cut HTML-tags
                "'([\r\n])[\s]+'",                 # cut whitespace characters
                "'&(quot|#34);'i",                 # replace HTML-entities
                "'&(amp|#38);'i",
                "'&(lt|#60);'i",
                "'&(gt|#62);'i",
                "'&(nbsp|#160);'i",
                "'&(iexcl|#161);'i",
                "'&(cent|#162);'i",
                "'&(pound|#163);'i",
                "'&(copy|#169);'i",
            ];

            $replace = ["", "", "\\1", "\"", "&", "<", ">", " ", chr(161), chr(162), chr(163), chr(169)];

            $this->value = preg_replace($search, $replace, $this->value);

            if ($nl2br) $this->value = nl2br($this->value);

            return $this;
        }

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

        public function __destruct()
        {
            $this->value = null;
        }
    }
}
