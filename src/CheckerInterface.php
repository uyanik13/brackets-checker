<?php

namespace BracesChecker;

interface CheckerInterface
{
    public function check(string $sentence): void;
}
