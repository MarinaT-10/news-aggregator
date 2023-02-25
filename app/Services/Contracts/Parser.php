<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface Parser
{
    /**
     * @param string $link
     * @return Parser
     */
    public function setLink(string $link): self;

    /**
     * @return array
     */
    public function getParseData(): array;

    /**
     * @param string $link
     * @return void
     */
    public function saveParseData(string $link): void;

    /**
     * @param string $link
     * @return void
     */
    public function saveParseDataInFile(string $link): void;
}
