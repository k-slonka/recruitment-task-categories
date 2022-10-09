<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class LocalizableModel extends Model
{

    /**
     * Localized attributes
     *
     * @var array
     */
    protected $localizable = [];

    /**
     * Whether or not to hide translations
     *
     * @var boolean
     */
    protected $hideTranslations = true;

    /**
     * Whether or not to append translatable attributes to array output
     *
     * @var boolean
     */
    protected $appendLocalizedAttributes = true;

    /**
     * Make a new translatable model
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        if ($this->hideTranslations) {
            $this->hidden[] = 'translations';
        }

        // We dynamically append localizable attributes to array output
        if ($this->appendLocalizedAttributes) {
            foreach ($this->localizable as $localizableAttribute) {
                $this->appends[] = $localizableAttribute;
            }
        }

        parent::__construct($attributes);
    }

    /**
     * This model's translations
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        $modelName = class_basename(get_class($this));

        return $this->hasMany("App\\Models\\Translations\\{$modelName}Translation");
    }

    /**
     * Magic method for retrieving a missing attribute
     *
     * @param string $attribute
     * @return mixed
     */
    public function __get($attribute)
    {

        if (in_array($attribute, $this->localizable)) {

            // We are looking for the current language of the application
            $translation = $this->translations
                ->where('locale', \App::getLocale())
                ->first();

            // We take the first language
            if (!$translation) {
                $translation = $this->translations->first();
            }

            return $translation->{$attribute};
        }

        return parent::__get($attribute);
    }

    /**
     * Magic method for calling a missing instance method
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        foreach ($this->localizable as $localizableAttribute) {
            if ($method === 'get' . Str::studly($localizableAttribute) . 'Attribute') {
                return $this->{$localizableAttribute};
            }
        }
        return parent::__call($method, $arguments);
    }

    public function getLocalizable()
    {
        return $this->localizable;
    }
}
