<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gerador de Assinaturas') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-9/12">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                <div class="p-6 bg-white rounded shadow-md">
                    <form id="signatureForm">
                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input id="nome" type="text" name="nome" value="João"
                                class="block w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                            <input id="cargo" type="text" name="cargo"
                                class="block w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="departamento"
                                class="block text-sm font-medium text-gray-700">Departamento</label>
                            <input id="departamento" type="text" name="departamento"
                                class="block w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email"
                                class="block w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                            <input id="telefone" type="tel" name="telefone"
                                class="block w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500"
                                x-mask="99/99/9999">
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Gerar
                            Assinatura</button>
                    </form>
                </div>
                <div id="signatureResult" class="hidden p-6 bg-white rounded shadow-md sm:block">
                    <h3 class="mb-2 text-lg font-bold">Assinatura Gerada</h3>
                    <div id="signatureOutput" class="p-4 border border-gray-300 rounded-md"></div>
                    <button id="downloadSignatureBtn"
                        class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Baixar
                        HTML</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('signatureForm').addEventListener('input', function() {
            const formData = new FormData(this);
            const signatureData = {};
            formData.forEach((value, key) => {
                signatureData[key] = value;
            });

            const signatureOutput = document.getElementById('signatureOutput');
            signatureOutput.innerHTML = `
            <div>
                <div style="color: #000000; font-size: 12pt; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-family: Tahoma; font-weight: bold;">${signatureData.nome}</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial;">${signatureData.cargo}</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial;">${signatureData.departamento}</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial;">Sicredi</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; font-family: 'Arial Regular'; font-size: 14px; background-color: #ffffff;">
                    <table style="box-sizing: border-box; border-collapse: collapse; max-width: 100%;">
                        <tbody style="box-sizing: border-box;">
                            <tr style="box-sizing: border-box;">
                                <td style="margin: 0px; box-sizing: border-box;" width="154.5"><img style="box-sizing: border-box; vertical-align: middle; float: left;" src="https://www.sicredi.com.br/media/coop/filer_public/2022/06/28/horizontal_preferencial_colorida_rgb.png" width="150" height="45" data-bit="iit"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial;">Av. Brasil, 5169 - Zona 04</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial;">87014-070 | Maringá - PR</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; background-color: #ffffff; font-size: 9pt; font-family: Arial; font-weight: bold;">T ${signatureData.telefone}</div>
                <div style="color: #000000; white-space: normal; box-sizing: border-box; font-family: 'Arial Regular'; font-size: 14px; background-color: #ffffff;">
                    <a style="color: #1155cc; box-sizing: border-box; background-position: 0px 0px; font-size: 9pt; font-family: Arial;" href="http://www.sicoobunicoob.com.br/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.sicoobunicoob.com.br/&amp;source=gmail&amp;ust=1712366565267000&amp;usg=AOvVaw3RVjUByv5n2BaMmWLOKWEZ"><strong style="box-sizing: border-box; font-weight: bold;">www.sicoobunicoob.<span class="il">com</span>.<span class="il">br</span></strong></a>
                </div>
            </div>`;

            document.getElementById('signatureResult').classList.remove('hidden');
        });

        document.getElementById('downloadSignatureBtn').addEventListener('click', function() {
            const signatureOutput = document.getElementById('signatureOutput').innerHTML;

            // Criar um arquivo HTML com o código gerado
            const blob = new Blob([signatureOutput], {
                type: 'text/html'
            });
            const url = URL.createObjectURL(blob);

            // Criar um link para download e clicar automaticamente nele
            const a = document.createElement('a');
            a.href = url;
            a.download = 'assinatura.html';
            document.body.appendChild(a);
            a.click();

            // Limpar a URL do objeto
            URL.revokeObjectURL(url);
        });
    </script>

</x-app-layout>
