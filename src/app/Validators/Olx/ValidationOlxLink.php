<?php

namespace App\Validators\Olx;

class ValidationOlxLink
{
    private const REGEX_VALIDATION_LINK = "/^https?:\/\/(www|m).olx.ua[\w\W]+/";
    public readonly ?string $link;

    /**
     * @param string|null $link
     * @throws \Exception
     */
    public function __construct(string $link = null)
    {
        $this->link = $this->validate($link);
    }

    /**
     * @param string|null $link
     * @return string
     * @throws \Exception
     */
    private function validate(string $link = null): string
    {
        if (is_null($link) || $link === "") {
            throw new \Exception("Посилланя не може бути пустим");
        }

        if ($this->checkIsLinkOlx($link) === 0) {
            throw new \Exception("Вставте посилання з OLX");
        }

        return $this->removeQueryParams($link);
    }

    /**
     * @param string $link
     * @return bool
     */
    private function checkIsLinkOlx(string $link): bool
    {
        return preg_match(self::REGEX_VALIDATION_LINK, $link,);
    }

    /**
     * @param string $link
     * @return string
     */
    private function removeQueryParams(string $link): string
    {
        return explode("?", $link)[0];
    }
}
