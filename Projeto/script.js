document.addEventListener('DOMContentLoaded', carregarClientes);

        function carregarClientes() {
            fetch('crud.php?action=read')
                .then(response => response.json())
                .then(data => {
                    let tableContent = '';
                    data.forEach(cliente => {
                        tableContent += `
                        <tr>
                            <td>${cliente.id}</td>
                            <td>${cliente.nome}</td>
                            <td>${cliente.telefone}</td>
                            <td>${cliente.endereco}</td>
                            <td>
                                <button class="edit-btn" onclick="editarCliente(${cliente.id}, '${cliente.nome}', '${cliente.telefone}', '${cliente.endereco}')">Editar</button>
                                <button class="delete-btn" onclick="deletarCliente(${cliente.id})">Excluir</button>
                            </td>
                        </tr>
                        `;
                    });
                    document.getElementById('clienteTable').innerHTML = tableContent;
                });
        }

        document.getElementById('clientForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('id').value;
            const nome = document.getElementById('nome').value;
            const telefone = document.getElementById('telefone').value;
            const endereco = document.getElementById('endereco').value;

            if (!/^\d{11}$/.test(telefone)) {
                alert("O número de telefone deve conter exatamente 11 dígitos.");
                return;
            }
            let url = id ? 'crud.php?action=update' : 'crud.php?action=create'; 

            fetch(url, {
                method: "POST",
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}&nome=${nome}&telefone=${telefone}&endereco=${endereco}`
            }).then(response => response.json())
                .then(() => {
                    carregarClientes();
                    document.getElementById('clientForm').reset();
                    document.getElementById('id').value = '';
                });
        });

        function editarCliente(id, nome, telefone, endereco) {
            document.getElementById('id').value = id;
            document.getElementById('nome').value = nome;
            document.getElementById('telefone').value = telefone;
            document.getElementById('endereco').value = endereco;
        }

        function deletarCliente(id) {
            if (confirm("Você tem certeza que deseja excluir esse cliente?")) {
                fetch('crud.php?action=delete', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${id}`
                }).then(response => response.json())
                    .then(() => carregarClientes());
            }
        }