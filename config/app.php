<?php

namespace config\app;

function getStorageFilePath(): string
{
    return $_ENV['STORAGE_FILEPATH'];
}

function getStorageDriver(): string
{
    return $_ENV['STORAGE_ADAPTER'];
}