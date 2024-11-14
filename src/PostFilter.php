<?php

namespace API;

class PostFilter
{
    private array $posts;
    private array $comments;

    public function __construct(array $posts, array $comments)
    {
        $this->posts = $posts;
        $this->comments = $comments;
    }

    public function filter(int $userId, string $startDate, string $endDate): array
    {
       
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        // Store comments grouped by postId
        $commentsByPostId = [];
        foreach ($this->comments as $comment) {
            $postId = $comment['postId'];
            $commentsByPostId[$postId][] = $comment;
        }

        // Filter posts based on criteria
        $filteredPosts = [];
        foreach ($this->posts as $post) {
            // Convert post created_at to timestamp
            $postDate = strtotime($post['created_at']);
            //echo "Post Date: " . date('Y-m-d H:i:s', $postDate) . "\n";

            // Check if the post meets the filter criteria
            if ($post['userId'] === $userId && $postDate >= $startDate && $postDate <= $endDate && isset($commentsByPostId[$post['id']])) {
                usort($commentsByPostId[$post['id']], fn($a, $b) => $a['id'] - $b['id']);
                $filteredPosts[] = [
                    'postId' => $post['id'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'comments' => $commentsByPostId[$post['id']]
                ];
            } 
        }

        // Sort filtered posts by postId
        usort($filteredPosts, fn($a, $b) => $a['postId'] - $b['postId']);
        return $filteredPosts;
    }



}
