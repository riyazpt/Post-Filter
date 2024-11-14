# PHP Script to Retrieve and Process Data from Two API Endpoints

## Overview
This PHP script retrieves data from two API endpoints, aggregates posts and their associated comments, filters and sorts the data based on specific criteria, and outputs the result as a compact JSON string.

## Endpoints

1. **Posts Endpoint**: Retrieves all posts.store the response
   - URL: `http://coderbyte.com/api/challenges/json/all-posts`

2. **Comments Endpoint**: Retrieves all comments.  store the response.
   - URL: `http://coderbyte.com/api/challenges/json/all-comments`

 **Author Filter**: Only posts authored by a user with `userId = 1` are included.
- **Date Range Filter**: Only posts created between January 2nd, 2021 and January 2nd, 2024 are included.
- **Comment Requirement**: Posts must have at least one associated comment.
- **Sorting**: 
  - Posts are sorted by their `id` in ascending order.
  - Comments within each post are also sorted by their `id` in ascending order.

### Output
The final output is returned as a **non-prettified** JSON string (a compact single-line JSON). This ensures that no extra spaces, line breaks, or formatting are added for validation purposes.
## Usage

- **Clone or Download**: Clone or download the PHP script to your local machine.

```composer dump-autoload ```


- **Run the Script**: Ensure your environment has PHP installed and execute the script using the command line:
  ```bash
  php index.php

