document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('table-body');

    async function fetchData() {
        try {
            const response = await fetch('values.json');
            const json = await response.json();
            // Concaténer tous les items en un seul tableau
            let allItems = json.items.flat();
            // Trier les éléments par temps du plus récent au plus lointain
            allItems.sort((a, b) => new Date(b.temps) - new Date(a.temps));
            updateTable(allItems);
        } catch (error) {
            console.error('Erreur lors de la récupération des données:', error);
        }
    }

    function updateTable(items) {
        tableBody.innerHTML = '';
        items.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.temperature} °C</td>
                <td>${arrondirSelonRegles(item.pression)} hPa</td>
                <td>${item.qualite} PM2,5</td>
                <td>${item.temps}</td>
                <td>${item.ip}</td>
                <td>${item.mac}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    function arrondirSelonRegles(nombre) {
        let partieEntiere = Math.floor(nombre);
        let partieDecimale = nombre - partieEntiere;
    
        if (partieDecimale >= 0.0 && partieDecimale <= 0.5) {
            return partieEntiere; // Arrondir vers le bas
        } else {
            return Math.ceil(nombre); // Arrondir vers le haut
        }
    }
    fetchData();
    setInterval(fetchData, 1000);
});
