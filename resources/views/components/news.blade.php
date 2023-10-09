<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed de Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-8">
    <!-- Cabeçalho do Feed -->
    <h1 class="text-3xl font-semibold mb-4">Feed de Notícias</h1>

    <!-- Lista de Postagens do Feed -->
    <div class="space-y-4" id="feed">
        <!-- Postagem 1 -->
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Título da Postagem 1</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam suscipit magna eget...</p>
        </div>

        <!-- Postagem 2 -->
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Título da Postagem 2</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam suscipit magna eget...</p>
        </div>

        <!-- Postagem 3 -->
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold mb-2">Título da Postagem 3</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam suscipit magna eget...</p>
        </div>
    </div>

    <!-- Botão "Ver mais" -->
    <button class="block mx-auto mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg" onclick="loadMorePosts()">Ver mais</button>
</div>

<script>
    let postCount = 3;

    function loadMorePosts() {
        // Simule o carregamento de mais postagens (adicionar mais postagens ao feed)
        for (let i = 0; i < 3; i++) {
            postCount++;
            const newPost = document.createElement("div");
            newPost.className = "bg-white p-4 shadow rounded-lg";
            newPost.innerHTML = `
                <h2 class="text-xl font-semibold mb-2">Título da Postagem ${postCount}</h2>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam suscipit magna eget...</p>
            `;
            document.getElementById("feed").appendChild(newPost);
        }
    }
</script>

</body>
</html>
