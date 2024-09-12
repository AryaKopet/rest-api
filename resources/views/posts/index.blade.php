<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Axios for API calls -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">List of Posts</h1>

        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody id="posts-table">
                <!-- Data akan dimuat di sini -->
            </tbody>
        </table>
    </div>

    <script>
        // Fetch data from API when DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            axios.get('/api/posts')
                .then(function(response) {
                    // Check if the API response format matches the expected structure
                    if (response.data.success && response.data.data) {
                        let posts = response.data.data.data; // Assuming paginated data under `data`

                        // Sort posts by ID in ascending order (smallest to largest)
                        posts.sort((a, b) => a.id - b.id);

                        let tableBody = '';

                        // Iterate over each post to build the table rows
                        posts.forEach(post => {
                            tableBody += `
                                <tr>
                                    <td>${post.id}</td>
                                    <td><img src="${post.image}" alt="${post.title}" width="100"></td>
                                    <td>${post.title}</td>
                                    <td>${post.content}</td>
                                </tr>
                            `;
                        });

                        // Insert the built rows into the table body
                        document.getElementById('posts-table').innerHTML = tableBody;
                    } else {
                        console.error('API response structure unexpected:', response.data);
                    }
                })
                .catch(function(error) {
                    console.error('Error fetching posts:', error);
                });
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
