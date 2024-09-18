<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://laravel.com/favicon.ico" type="image/x-icon">
    <title>Posts</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Axios for API calls -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Top List Jawir Collection</h1>

        <table class="table table-bordered table-hover mt-3">
            <thead class="thead-dark">
                <tr class="text-center">
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
    <br><br><br>

    <script>
        async function fetchAllPosts() {
            let allPosts = [];
            let currentPage = 1;
            let totalPages = 1;

            while (currentPage <= totalPages) {
                try {
                    const response = await axios.get(`/api/posts?page=${currentPage}`);
                    
                    if (response.data.success && response.data.data) {
                        let posts = response.data.data.data; // Assuming paginated data under data
                        totalPages = response.data.data.last_page; // Get total pages
                        allPosts = allPosts.concat(posts); // Combine new posts with existing posts
                        currentPage++;
                    } else {
                        console.error('API response structure unexpected:', response.data);
                        break;
                    }
                } catch (error) {
                    console.error('Error fetching posts:', error);
                    break;
                }
            }

            // Sort posts by ID in ascending order (smallest to largest)
            allPosts.sort((a, b) => a.id - b.id);

            let tableBody = '';

            // Iterate over each post to build the table rows
            allPosts.forEach(post => {
                tableBody += `
                    <tr>
                        <td class="text-center">${post.id}</td>
                        <td class="text-center"><img src="${post.image}" alt="${post.title}" width="75" height="75"></td>
                        <td class="text-center">${post.title}</td>
                        <td>${post.content}</td>
                    </tr>
                `;
            });

            // Insert the built rows into the table body
            document.getElementById('posts-table').innerHTML = tableBody;
        }

        // Fetch all data when DOM is fully loaded
        document.addEventListener('DOMContentLoaded', fetchAllPosts);
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
