const checkboxes = document.querySelectorAll('input[type="checkbox"][data-id]');

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', async (event) => {
    const playerId = event.target.getAttribute('data-id');
    const isChecked = event.target.checked; 
    
    event.target.disabled = true;

    try {
      
      const response = await fetch(`/app/v1/players/${playerId}/confirm`, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ confirmed: isChecked }),
      });

      if (!response.ok) {
        throw new Error('Erro ao salvar alteração!');
      }

      const data = await response.json();
      console.log(`Jogador ${playerId} atualizado com sucesso:`, data);
    } catch (error) {
      console.error('Erro ao atualizar jogador:', error);

      event.target.checked = !isChecked;
      alert('Erro ao salvar alteração. Tente novamente!');
    } finally {

      event.target.disabled = false;
    }
  });
});
