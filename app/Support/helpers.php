<?php

/**
 * This is a file with global helper functions
 */

if (!function_exists('getRepositoryClassName')) {

    /**
     * @param string $className
     *
     * @return string
     */
    function getRepositoryClassName(string $className): string
    {
        $patterns = explode('\\', $className);

        return str_replace('Repository', '', $patterns[count($patterns) - 1]);
    }
}
