<?php

use Illuminate\Pagination\LengthAwarePaginator;

/*
 * Custom Paginate helper. Meta will adjust the
 * paginated urls based on the params provided
 * during search.
 */
if (!function_exists('paginated')) {
    /**
     * @param LengthAwarePaginator $results
     * @param mixed $resource
     * @param int $page
     * @param array $params
     */
    function paginated($results, $resource, $page = 1, $params = [])
    {
        if (!($results instanceof LengthAwarePaginator)) {
            throw new Exception('Parameter results must be from an eloquent paginate query.');
        }

        // set the custom url params
        $urlParams = http_build_query($params);

        $firstPageUrl = $results->url(1) . '&' . $urlParams;
        $nextPageUrl = ($results->nextPageUrl()) ? $results->nextPageUrl() . '&' . $urlParams : null;
        $previousPageUrl = ($results->previousPageUrl()) ? $results->previousPageUrl() . '&' . $urlParams : null;

        return [
            'data' => $resource::collection($results),
            'meta' => [
                'total' => $results->total(),
                'currentPage' => $page,
                'lastPage' => $results->lastPage(),
                'perPage' => $results->perPage(),
                'firstPageUrl' => $firstPageUrl,
                'previousPageUrl' => $previousPageUrl,
                'nextPageUrl' => $nextPageUrl,
                'url' => $results->url($page) . '&' . $urlParams,
            ],
        ];
    }
}

/*
 * Gets the first letters of each word to generate
 * initials that can be used in thumbnails and etc.
 */
if (!function_exists('get_initials')) {
    /**
     * @param string $content
     * @return string $initials
     */
    function get_initials(string $content): string
    {
        $initials = '';

        foreach (explode(' ', $content) as $word) {
            $initials .= $word[0];
        }

        return strtoupper($initials);
    }
}

/*
 * Insert or Update data to class model
 */
if (!function_exists('insert_unique_data')) {
    /**
     * @param model $model
     * @param array $items
     * @param array $fields
     * @param string $unique
     */
    function insert_unique_data($model, $items, $fields, $unique)
    {
        foreach ($items as $item) {
            $data = [];
            foreach ($fields as $field) {
                $data[$field] = $item[$field];
            }
            $checker = !empty($unique) ? [$unique => $item[$unique]] : [];
            $model->updateOrCreate($checker, $data);
        }
    }
}
