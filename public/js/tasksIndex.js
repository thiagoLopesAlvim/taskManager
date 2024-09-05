document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os botões de exclusão
    const deleteButtons = document.querySelectorAll('.delete-button');

    // Adiciona um evento de clique a cada botão
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Impede o comportamento padrão do botão
            
            const form = this.closest('form'); // Encontra o formulário pai do botão
            
            Swal.fire({
                title: "Tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submete o formulário se o usuário confirmar
                }
            });
        });
    });
});
