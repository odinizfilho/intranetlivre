<div class="container mx-auto py-8">
    <div id="linksContainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        <!-- Links padrões para Google e Facebook -->
        <div class="p-4">
            <a href="https://www.google.com" target="_blank" class="block bg-white rounded-lg shadow-lg p-2 transition duration-300 hover:bg-gray-200">
                <i class="material-icons text-2xl text-blue-500">search</i>
                <span class="text-center text-sm">Google</span>
            </a>
        </div>
        <div class="p-4">
            <a href="https://www.facebook.com" target="_blank" class="block bg-white rounded-lg shadow-lg p-2 transition duration-300 hover:bg-gray-200">
                <i class="material-icons text-2xl text-blue-500">facebook</i>
                <span class="text-center text-sm">Facebook</span>
            </a>
        </div>
        <!-- Links adicionados pelo usuário serão exibidos aqui -->
    </div>

    <!-- Botão para adicionar mais links -->
    <div class="mt-4 text-center">
        <button id="addLinkButton" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
            <i class="material-icons w-6 h-6 inline-block mr-2">add</i>
            Adicionar Link
        </button>
    </div>
</div>


<script>
    // Função para adicionar um novo bloco de link
    function addNewLink() {
        const linksContainer = document.getElementById('linksContainer');
        const newLinkDiv = document.createElement('div');
        newLinkDiv.classList.add('p-4');
        newLinkDiv.innerHTML = `
            <div class="block bg-white rounded-lg shadow-lg p-2 transition duration-300 hover:bg-gray-200">
                <i class="material-icons text-2xl text-blue-500">link</i>
                <span class="text-center text-sm font-semibold" id="title">Novo Link</span>
                <a href="#" target="_blank" class="text-blue-500 text-sm hover:underline" id="url">https://example.com</a>
            </div>
        `;

        // Solicitar ao usuário para informar o título e o URL
        const title = prompt("Digite o título do novo site:");
        const url = prompt("Digite o URL do novo site:");

        if (title && url) {
            newLinkDiv.querySelector('#title').textContent = title;
            newLinkDiv.querySelector('#url').textContent = url;
            newLinkDiv.querySelector('a').href = url;

            // Salvar os dados na memória do navegador
            const savedLinks = JSON.parse(localStorage.getItem('savedLinks')) || [];
            savedLinks.push({ title, url });
            localStorage.setItem('savedLinks', JSON.stringify(savedLinks));

            linksContainer.appendChild(newLinkDiv);
        }
    }

    // Adicione um novo link quando o botão for clicado
    const addLinkButton = document.getElementById('addLinkButton');
    addLinkButton.addEventListener('click', addNewLink);

    // Recupere e exiba os links salvos da memória do navegador, incluindo Google e Facebook
    const savedLinks = JSON.parse(localStorage.getItem('savedLinks')) || [];
    const linksContainer = document.getElementById('linksContainer');
    savedLinks.forEach(link => {
        const newLinkDiv = document.createElement('div');
        newLinkDiv.classList.add('p-4');
        newLinkDiv.innerHTML = `
            <div class="block bg-white rounded-lg shadow-lg p-2 transition duration-300 hover:bg-gray-200">
                <a href="${link.url}" target="_blank">
                    <i class="material-icons text-2xl text-blue-500">link</i>
                    <span class="text-center text-sm font-semibold">${link.title}</span>
                </a>
            </div>
        `;
        linksContainer.appendChild(newLinkDiv);
    });
</script>
