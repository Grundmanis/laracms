<?php

namespace Grundmanis\Laracms\Modules\Dashboard;

class LocalesGenerator
{

    /**
     * @var array
     */
    private $locales = [];

    /**
     * LocalesGenerator constructor.
     */
    public function __construct()
    {
        $this->generate();
    }

    /**
     * @return array
     */
    private function generate()
    {
        foreach (config('translatable.locales') as $locale) {
            if (is_array($locale)) {
                foreach ($locale as $lng) {
                    $this->locales[] = $lng;
                }
                continue;
            }
            $this->locales[] = $locale;
        }

        return $this->locales;
    }

    /**
     * @return mixed
     */
    public function getLocales()
    {
        return $this->locales;
    }
}