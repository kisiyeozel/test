<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        $locale = App::getLocale();
        if ($locale === 'tr') {
            return $value;
        }

        $translatable = property_exists($this, 'translatableFields') ? $this->translatableFields : [];
        if (!in_array($key, $translatable)) {
            return $value;
        }

        $translations = $this->getTranslations();
        return $translations[$locale][$key] ?? $value;
    }

    public function setTranslation($field, $locale, $value)
    {
        $translations = $this->getTranslations();
        $translations[$locale][$field] = $value;
        $this->attributes['translations'] = json_encode($translations, JSON_UNESCAPED_UNICODE);
    }

    protected function getTranslations()
    {
        if (empty($this->attributes['translations'])) return [];
        $value = $this->attributes['translations'];
        if (is_array($value)) return $value;
        return json_decode($value, true) ?? [];
    }

    public function scopeWhereTranslation($query, $field, $value, $locale = null)
    {
        $locale = $locale ?? App::getLocale();
        if ($locale === 'tr') {
            return $query->where($field, 'like', "%{$value}%");
        }
        return $query->where('translations', 'like', "%\"{$locale}\"%{$value}%");
    }
}
