<?php
/**
 * Class GridDataProvider
 * @project   <Grid Data Providing for PHP language>
 * @package   App\lib\grid
 * @author    ArGabid <argabid@gmail.com>
 * @copyright 2018-2019, ArGabid, License MIT, All rights reserved
 */

namespace App\lib\grid
{
    use Exception;

    class GridDataProvider implements IGridFormProvider, IGridTableProvider
    {
        protected $data = [
            'items'            => null,
            'fields'           => [],
            'safeFields'       => [],
            'requiredFields'   => [],
            'inputTypes'       => [],
            'inputSizes'       => [],
            'inputOptions'     => [],
            'inputPrompts'     => [],
            'inputErrors'      => [],
            'tableCellPrompts' => [],
        ];

        /*
         * IGridData Provider
         * */
        protected $dataProvider;

        /*
         * Data Object
         * */
        protected $entity;

        /**
         * GridDataProvider constructor.
         *
         * @param object $entity
         */
        public function __construct($entity)
        {
            $this->setEntity($entity);
        }

        public function setDataProvider(IGridData $provider)
        {
            $this->dataProvider = $provider;

            return $this;
        }

        /**
         * @return IGridData|GridData
         */
        public function getDataProvider()
        {
            return $this->dataProvider;
        }

        /**
         * @param object $entity
         *
         * @return $this
         * @throws \Exception
         */
        public function setEntity($entity)
        {
            if (false === empty($this->entity))

                throw new Exception('The Entity is already set.');

            if (false === get_class($entity))

                throw new Exception('The Entity is not a valid class object.');

            $this->entity = $entity;

            return $this;
        }

        /**
         * @return object
         */
        public function getEntity()
        {
            return $this->entity;
        }

        public function getItems()
        {
            return $this->data['items'];
        }

        public function setItems(array $items)
        {
            $this->data['items'] = $items;

            return $this;
        }

        public function checkData(string $key)
        {
            if (false == array_key_exists($key, $this->data))

                throw new Exception(sprintf('The data key `%s` is not found in GridDataProvider.', $key));
        }

        public function setData(array $data)
        {
            foreach ($data as $key => $value)
            {
                $this->checkData($key);

                $this->data[$key] = is_array($value) ? array_merge((array) $this->data[$key], $value) : $value;
            }

            return $this;
        }

        public function fetchData()
        {
            foreach ($this->getDataProvider()->fetchFields() as $field)
            {
                $this->data['fields'][$field['field']] = $field['name'];

                if (false == empty($field['type']))
                {
                    if ($field['type'] === GridForm::DEFAULT_INPUT_TYPE)

                        $field['type'] = 'textarea';

                    $this->data['inputTypes'][$field['field']] = $field['type'];
                }

                if (false == empty($field['size']))

                    $this->data['inputSizes'][$field['field']] = $field['size'];

                if (false == empty($field['prompt']))

                    $this->data['inputPrompts'][$field['field']] = $field['prompt'];

                if (false == empty($field['required']))

                    $this->data['requiredFields'][] = $field['field'];
            }

            return $this;
        }

        public function gridFields(): array
        {
            return $this->data['fields'];
        }

        public function gridSafeFields(): array
        {
            return $this->data['safeFields'];
        }

        public function gridRequiredFields(): array
        {
            return $this->data['requiredFields'];
        }

        public function gridInputTypes(): array
        {
            return $this->data['inputTypes'];
        }

        public function gridInputOptions(): array
        {
            return $this->data['inputOptions'];
        }

        public function gridInputSizes(): array
        {
            return $this->data['inputSizes'];
        }

        public function gridInputPrompts(): array
        {
            return $this->data['inputPrompts'];
        }

        public function gridInputErrors(): array
        {
            return $this->data['inputErrors'];
        }

        public function gridTableCellPrompts()
        {
            return $this->data['tableCellPrompts'];
        }

        public function __get(string $prop)
        {
            return $this->entity->{$prop};
        }
    }
}
