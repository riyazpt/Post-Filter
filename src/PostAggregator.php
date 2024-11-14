<?php

namespace API;

class PostAggregator
{
    private APIClient $apiClient;

    public function __construct(APIClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getAggregatedPosts(): string
    {
        $posts = $this->apiClient->fetchData("/api/challenges/json/all-posts") ?? [];
        $comments = $this->apiClient->fetchData("/api/challenges/json/all-comments") ?? [];
        

        $postFilter = new PostFilter($posts, $comments);

        $filteredPosts = $postFilter->filter(
            userId: 1,
            startDate: "2021-01-02",
            endDate: "2024-01-02"
        );

        return json_encode($filteredPosts);
    }
}
