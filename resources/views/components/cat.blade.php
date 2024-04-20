<style>
    /* Estilos personalizados */
    .slide-container {
        position: relative;
        overflow-x: hidden;
        white-space: nowrap;
    }

    .category-card {
        display: inline-block;
        width: 200px;
        margin-right: 20px;
        background-color: #f0f0f0;
        border-radius: 8px;
        padding: 20px;
    }

    .slide-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .slide-button:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .slide-button-left {
        left: 0;
    }

    .slide-button-right {
        right: 0;
    }
</style>
</head>

<body class="bg-gray-100">
    <div class="container relative py-10 mx-auto">
        <div class="slide-container">
            <!-- Exemplo de cards de categoria -->
            @foreach ($categories as $category)
                <div class="category-card bg-gradient-to-r from-gray-100 via-[#bce1ff] to-gray-100">
                    <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                    <p>Descrição da Categoria 1</p>
                </div>
            @endforeach
            <!-- Adicione mais cards conforme necessário -->
        </div>
        <div class="slide-button slide-button-left"
            onclick="document.querySelector('.slide-container').scrollBy(-200, 0)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </div>
        <div class="slide-button slide-button-right"
            onclick="document.querySelector('.slide-container').scrollBy(200, 0)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
    </div>
