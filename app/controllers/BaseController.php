<?php

class BaseController
{
    /**
     * Render a view and pass data to it
     *
     * @param string $viewPath Path of the view (e.g., 'users/add')
     * @param array $data Associative array of data to pass to the view
     */
    protected function render($viewPath, $data = [])
    {
        // Extract data to be used as variables in the view
        extract($data);

        // Determine the full path of the view file
        $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';

        // Check if the view file exists
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "View file not found: $viewFile";
        }
    }
}
