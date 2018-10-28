<?php
/**
 * Class GridForm
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    class GridForm extends Grid
    {
        const DEFAULT_INPUT_TYPE = 'text';

        const DEFAULT_INPUT_TAG = 'input';

        protected $tag = 'form';

        protected $token = [];

        protected $input = [];

        protected $inputAttributes = [];

        protected $inputOptions = [];

        protected $label = [];

        protected $labelTemplate = null;

        protected $labelAttributes = [];

        protected $inputRequestName = null;

        protected $prefixID = null;

        protected $renderTemplate = 'grid-form/form.php';

        protected $setTypes = ['select', 'checkbox', 'radio', 'file', 'number', 'date', 'time', 'datetime-local'];

        protected $maxTextInputSize = 255;

        /**
         * GridForm constructor.
         *
         * @param IGridFormProvider $provider
         * @param array|null $tagAttributes
         * @param bool $loadInputs
         */
        public function __construct(IGridFormProvider $provider, array $tagAttributes = null, bool $loadInputs = true)
        {
            parent::__construct($provider);

            if ($tagAttributes !== null)

                $this->setForm($tagAttributes);

            if ($loadInputs)

                $this->loadInputs();
        }

        public function setForm(array $attr = [])
        {
            $this->setTagAttributes(array_merge(['method' => 'post', 'enctype' => 'multipart/form-data'], $attr));

            return $this;
        }

        public function setInputRequestName(bool $dash = true, string $name = null, array $inputData = [])
        {
            $name = $name ?: $this->getEntityName();

            $this->inputRequestName = $dash ? GridDataFormatter::dashName($name) : $name;

            foreach ($inputData as $k => $data)
            {
                if ($this->checkInput($k))

                    $this->input[$k]['request_name'] = $data;
            }

            return $this;
        }

        public function getInputRequestName(string $key = null)
        {
            $rn = $this->input[$key]['request_name'] ?? $this->inputRequestName;

            return $rn ? sprintf('%s[%s]', $rn, $this->getInputName($key)) : $this->getInputName($key);
        }

        public function getInputName(string $key)
        {
            return preg_replace('#[^a-z\d\-_\[\]]+#i', '', $this->input[$key]['name'] ?? $key);
        }

        public function setPrefixID(string $name = null, bool $dash = true)
        {
            $name = $name ?? substr(md5(microtime(true)), 0, 10) . $this->getEntityName();

            $this->prefixID = ($dash ? GridDataFormatter::dashName($name) : $name) . '-';

            return $this;
        }

        public function getPrefixedInputID(string $key)
        {
            return $this->prefixID . $this->getInputID($key);
        }

        public function setInputID(array $inputData, bool $dash = true)
        {
            if (null === $this->prefixID)

                $this->setPrefixID(null, $dash);

            foreach ($inputData as $k => $data)
            {
                if ($this->checkInput($k))

                    $this->input[$k]['id'] = $data;
            }

            return $this;
        }

        public function getInputID(string $key)
        {
            return preg_replace('#[^a-z\d\-_]+#i', '', $this->input[$key]['id'] ?? $key);
        }

        public function loadInput(string $key)
        {
            $this->input[$key] = [
                'id'    => $this->input[$key]['id'] ?? $this->getPrefixedInputID($key),
                'name'  => $this->input[$key]['name'] ?? $this->getInputName($key),
                'type'  => $this->input[$key]['type'] ?? self::DEFAULT_INPUT_TYPE,
                'tag'   => $this->input[$key]['tag'] ?? self::DEFAULT_INPUT_TAG,
                'value' => $this->input[$key]['value'] ?? $this->getEntityProp($key),
                'error' => $this->getError($key),
            ];

            $this->prompt[$key] = $this->getPrompt($key) ?? ($this->getProvider()->gridInputPrompts()[$key] ?? null);

            $this->inputAttributes[$key] = $this->getInputAttributes($key);

            $this->inputOptions[$key] = $this->getInputOptions($key);

            $this->label[$key] = $this->getLabel($key);

            $this->labelTemplate[$key] = $this->getLabelTemplate($key);

            $this->labelAttributes[$key] = $this->getLabelAttributes($key);

            return $this;
        }

        public function loadInputs()
        {
            if (empty($this->getProvider()->gridInputTypes()))

                throw new \logicException(

                    sprintf('The `gridInputTypes` method`s result is empty in `%s` class.', get_class($this->getEntity())));

            $this->setPrefixID();

            $setTypes = array_flip($this->setTypes);

            $safe = array_flip($this->getProvider()->gridSafeFields());

            $types = array_diff_key($this->getProvider()->gridInputTypes(), $safe);

            $opt = array_keys(array_diff_key($this->getProvider()->gridInputOptions(), $safe));

            $sizes = $this->getProvider()->gridInputSizes();

            $optKeys = array_flip($opt);

            foreach (array_merge($optKeys, $types) as $k => $type)
            {
                $type = strtolower($type);

                if ($type === 'tinyint' && ($size = $sizes[$k] ?? false) && false == is_array($size) && intval($size) < 2)
                {
                    $this->setRadio($k);

                    continue;
                }

                $this->setInput($k, null, $type);

                if (isset($optKeys[$k]))
                {
                    false == $this->isOptionalInput($k) ? $this->setSelect($k) : $this->setInputOptions($k);

                    continue;
                }

                if ($type === self::DEFAULT_INPUT_TYPE)
                {
                    if (false == array_key_exists($k, $sizes))

                        $sizes[$k] = $this->maxTextInputSize;

                    continue;
                }

                if (isset($setTypes[$type]))

                    continue;

                $this->switchInputType($type, $k);
            }

            $this->setSizes($sizes);

            return $this;
        }

        protected function switchInputType($type, $inputKey)
        {
            switch ($type)
            {
                case 'string':
                case 'varchar':
                case 'char':
                case 'tinytext':
                    $this->setInputType($inputKey, self::DEFAULT_INPUT_TYPE);
                    break;
                case 'textarea':
                case 'longtext':
                case 'mediumtext':
                    $this->setTextarea($inputKey);
                    break;
                case 'integer':
                case 'bigint':
                case 'mediumint':
                case 'smallint':
                case 'tinyint':
                case 'int':
                    $this->setInputType($inputKey, 'number');
                    break;
                case 'datetime':
                case 'timestamp':
                    $this->setDateTime($inputKey);
                    break;
                case 'float':
                case 'double':
                case 'decimal':
                case 'numeric':
                    $this->setInputType($inputKey, 'number')->setInputAttribute($inputKey, ['step' => 0.1]);
                    break;
                case 'boolean':
                case 'bool':
                    $this->setRadio($inputKey);
                    break;
                case 'hidden':
                    $this->hideInput($inputKey);
            }
        }

        public function setSizes(array $sizes)
        {
            $setTypes = array_flip($this->setTypes);

            foreach ($sizes as $k => $size)
            {
                $type = $this->getInputType($k);

                if (isset($setTypes[$type]) || null === $size)

                    continue;

                if ($type === 'number')
                {
                    if (is_array($size))
                    {
                        $min = $size[0] ?? null;

                        $max = $size[1] ?? null;

                        $step = $size[2] ?? null;

                        if (isset($min) && false == isset($this->getInputAttributes($k)['min']))

                            $this->setInputAttribute($k, ['min' => intval($min)]);

                        if (isset($max) && false == isset($this->getInputAttributes($k)['max']))

                            $this->setInputAttribute($k, ['max' => intval($max)]);

                        if (isset($step) && false == isset($this->getInputAttributes($k)['step']))

                            $this->setInputAttribute($k, ['step' => floatval($step)]);

                        continue;
                    }

                    $this->setInputAttribute($k, ['max' => intval($size)]);

                    continue;
                }

                $size = intval($this->getInputAttributes($k)['maxlength'] ?? $size);

                if ($size > $this->maxTextInputSize)

                    $this->setTextarea($k);

                $this->setInputAttribute($k, ['maxlength' => $size]);
            }

            return $this;
        }

        public function setMaxTextInputSize(int $max)
        {
            $this->maxTextInputSize = $max;

            return $this;
        }

        public function setValues(array $values = [], callable $func = null)
        {
            foreach ($this->getInputKeys() as $k)
            {
                $this->setValue($k, $values[$k] ?? ($func !== null ? call_user_func($func, $k, $this) : $this->getInputValue($k)));
            }

            return $this;
        }

        public function setInputType(string $key, string $type, bool $setAttribute = true)
        {
            $this->input[$key]['type'] = $type;

            $this->setInputAttribute($key, ['type' => $setAttribute ? $type : false]);

            return $this;
        }

        public function getInputType(string $key)
        {
            return $this->input[$key]['type'] ?? null;
        }

        public function checkInput(string $key)
        {
            return isset($this->input[$key]);
        }

        public function getInput(string $key = null)
        {
            return $key !== null ? ($this->input[$key] ?? null) : $this->input;
        }

        public function setError(string $key, $message)
        {
            $this->input[$key]['error'] = $message;

            return $this;
        }

        public function getError(string $key)
        {
            return $this->input[$key]['error'] ?? ($this->getProvider()->gridInputErrors()[$key] ?? null);
        }

        public function unsetInput(string $key)
        {
            if ($this->checkInput($key))
            {
                unset($this->input[$key],
                    $this->label[$key],
                    $this->labelAttributes[$key],
                    $this->labelTemplate[$key],
                    $this->inputAttributes[$key],
                    $this->inputOptions[$key],
                    $this->prompt[$key]
                );
            }

            return $this;
        }

        public function unsetInputs(array $keys)
        {
            foreach ($keys as $key)
            {
                $this->unsetInput($key);
            }

            return $this;
        }

        public function getInputKeys()
        {
            return array_keys($this->input);
        }

        protected function setInputTag(string $key, string $tag)
        {
            $this->input[$key]['tag'] = $tag;

            return $this;
        }

        public function setValue(string $key, $value = null)
        {
            $this->input[$key]['value'] = $value === null ? $this->getEntityProp($key) : $value;

            return $this;
        }

        public function getInputValue(string $key, bool $getPrompt = true)
        {
            if ($this->checkInput($key))
            {
                $value = ($this->input[$key]['value'] === null && $getPrompt)

                    ? $this->getPrompt($key) : $this->input[$key]['value'];

                return (is_array($value) && false === $this->isOptionalInput($key)) ? $value[key($value)] : $value;
            }

            return null;
        }

        public function isOptionalInput(string $key, bool $checkValue = false)
        {
            if (in_array($this->getInputType($key), ['checkbox', 'radio', 'select']))

                return $checkValue ? false == empty($this->inputOptions[$key]) : true;

            return false;
        }

        public function setInputOptions(string $key, array $options = null)
        {
            $this->inputOptions[$key] = $options === null ? ($this->getProvider()->gridInputOptions()[$key] ?? []) : $options;

            return $this;
        }

        public function getInputOptions(string $key)
        {
            return $this->inputOptions[$key] ?? [];
        }

        public function setLabel(string $key, string $name, array $attr = [])
        {
            $this->label[$key] = $name;

            if ($attr)

                $this->labelAttributes[$key] = GridDataFormatter::setAttribute($this->getLabelAttributes($key), $attr);

            return $this;
        }

        public function getLabel(string $key)
        {
            return $this->label[$key] ?? ($this->getField($key) ?? ($this->getProvider()->gridFields()[$key] ?? null));
        }

        public function setLabelAttributes(string $key, array $attr = null)
        {
            $this->labelAttributes[$key] = $attr === null ? [] : GridDataFormatter::setAttribute($this->labelAttributes[$key] ?? [], $attr);

            return $this;
        }

        public function getLabelAttributes(string $key)
        {
            return $this->labelAttributes[$key] ?? null;
        }

        public function getLabels()
        {
            return $this->label;
        }

        public function setLabels(array $data = [])
        {
            foreach ($data as $k => $v)
            {
                $this->setLabel($k, $v);
            }

            return $this;
        }

        public function setLabelTemplate(string $template, array $inputKeys = [])
        {
            foreach ($inputKeys ?: $this->getInputKeys() as $k)
            {
                $this->labelTemplate[$k] = $template;
            }

            return $this;
        }

        public function getLabelTemplate(string $key)
        {
            return $this->labelTemplate[$key] ?? null;
        }

        public function setToken(string $value, string $name = '_token')
        {
            $this->token = [$name => $value];

            return $this;
        }

        public function getTokenValue()
        {
            return $this->token[$this->getTokenName()] ?? null;
        }

        public function getTokenName()
        {
            return $this->token ? key($this->token) : null;
        }

        public function inputUnwrap(string $key)
        {
            if (null === $this->getTemplate())

                $this->setTemplate('{input}', $key);

            return $this;
        }

        public function hideInput(string $key, $value = null, array $attr = [])
        {
            return $this->setInput($key, $value, 'hidden', $attr)->inputUnwrap($key);
        }

        public function hideInputs(array $keys)
        {
            foreach ($keys as $key)
            {
                $this->hideInput($key);
            }

            return $this;
        }

        public function toggleInput(string $key, bool $toggle = false)
        {
            $this->setInputAttribute($key, ['disabled' => ! $toggle]);

            return $this;
        }

        public function toggleInputs(array $inputData)
        {
            foreach ($inputData as $key => $value)
            {
                $this->toggleInput($key, boolval($value));
            }

            return $this;
        }

        public function unsetValue(string $key)
        {
            if ($this->checkInput($key))

                $this->input[$key]['value'] = null;

            return $this;
        }

        public function unsetValues(array $inputKeys)
        {
            foreach ($inputKeys as $k)
            {
                $this->unsetValue($k);
            }

            return $this;
        }

        public function resetForm()
        {
            return $this->unsetValues($this->getInputKeys());
        }

        public function setInput(string $key, $value = null, $type = null, array $attr = [])
        {
            if ($type === 'select')

                return $this->setSelect($key, null, null, $value, $attr);

            $this->loadInput($key);

            $this->setInputTag($key, self::DEFAULT_INPUT_TAG);

            $this->setInputType($key, $type ?? self::DEFAULT_INPUT_TYPE, true);

            if ($attr)

                $this->setInputAttribute($key, $attr);

            $this->setValue($key, $value);

            return $this;
        }

        public function setTextarea(string $key, $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $this->setInputType($key, 'textarea', false);

            $this->setInputTag($key, 'textarea');

            $this->setInputAttribute($key, $attr);

            $this->setValue($key, $value);

            return $this;
        }

        public function setRadio(string $key, array $options = null, $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $this->setInput($key, $value, 'radio', $attr);

            $this->setInputOptions($key, $options);

            return $this;
        }

        public function setCheckbox(string $key, array $options = null, $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $this->setInput($key, $value, 'checkbox', $attr);

            $this->setInputOptions($key, $options);

            return $this;
        }

        public function setSelect(string $key, array $options = null, $prompt = null, $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $this->setInputType($key, 'select', false);

            $this->setInputTag($key, 'select');

            $this->setInputAttribute($key, $attr);

            if ($prompt !== null)

                $this->setPrompt($key, $prompt);

            $this->setInputOptions($key, $options);

            $this->setValue($key, $value);

            return $this;
        }

        public function setDate(string $key, string $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $value = $value ?: $this->getInputValue($key);

            $this->setInput($key, $value ? date('Y-m-d', strtotime($value)) : null, 'date', $attr);

            return $this;
        }

        public function setTime(string $key, string $value = null, array $attr = [])
        {
            $this->loadInput($key);

            $value = $value ?: $this->getInputValue($key);

            $this->setInput($key, $value ? date('H:i:s', strtotime($value)) : null, 'time', $attr);

            return $this;
        }

        public function setDateTime(string $key, string $value = null, array $attrDate = [], array $attrTime = [])
        {
            $this->loadInput($key);

            $value = $value ?: $this->getInputValue($key);

            $this->setDate($key, $value, $attrDate);

            $this->input[$key]['time'] = date('H:i:s', strtotime($value ?: '00:00:00'));

            $this->input[$key]['attr_time'] = $attrTime;

            return $this;
        }

        public function setInputAttribute(string $key, array $attr = null)
        {
            $this->inputAttributes[$key] =

                $attr === null ? [] : GridDataFormatter::setAttribute($this->inputAttributes[$key] ?? [], $attr);

            return $this;
        }

        public function setInputAttributes(array $inputData)
        {
            foreach ($inputData as $k => $attr)
            {
                $this->setInputAttribute($k, $attr);
            }

            return $this;
        }

        public function getInputAttributes(string $key)
        {
            return $this->inputAttributes[$key] ?? null;
        }

        public function loadAttributes(array $attr = null, array $skipTypes = [], array $skipKeys = [])
        {
            foreach ($this->getInputKeys() as $k)
            {
                if (($skipTypes && in_array($this->getInputType($k), $skipTypes))

                    || ($skipKeys && in_array($k, $skipKeys))
                )

                    continue;

                $this->setInputAttribute($k, $attr);
            }

            return $this;
        }

        public function setSortOrder(array $keysOrder)
        {
            $this->sortOrder = array_keys(array_merge(array_flip($keysOrder), $this->getInput(), $this->getRows()));

            return $this;
        }

    }
}
